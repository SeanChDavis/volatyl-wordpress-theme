(function() {

	/**
	 * Full navigation
	 */
	const topMenuItemsWithChildren = document.querySelectorAll('#site-navigation .menu > .menu-item-has-children > a');

	// Set initial aria-expanded state on all sub-menu toggle anchors
	topMenuItemsWithChildren.forEach(function(item) {
		item.setAttribute('aria-expanded', 'false');
	});

	// Loop through all top level menu anchors that have sub-menus
	topMenuItemsWithChildren.forEach(function(item) {

		// Listen for a click on a top level anchor whose parent list item has a sub-menu child
		item.addEventListener("click", function(event) {

			// When the anchor is clicked, toggle the class on the parent list item
			const isOpening = !event.target.parentNode.classList.contains("sub-menu-active");
			event.target.parentNode.classList.toggle("sub-menu-active");
			event.target.setAttribute('aria-expanded', isOpening ? 'true' : 'false');

			// Get the very first top level anchor, regardless of its parent's children
			let siblingItem = event.target.parentNode.parentNode.firstElementChild;

			// Look at each top level list item to see if any other sub-menus have the 'sub-menu-active' class
			// If any of them do, remove the class because there's a new sheriff in town (another sub-menu is open).
			do {

				if (event.target.parentNode !== siblingItem && siblingItem.classList.contains("sub-menu-active")) {
					siblingItem.classList.remove("sub-menu-active");
					const siblingAnchor = siblingItem.querySelector(':scope > a');
					if (siblingAnchor) {
						siblingAnchor.setAttribute('aria-expanded', 'false');
					}
				}

			} while (siblingItem = siblingItem.nextElementSibling);

			event.preventDefault();
		})
	});

	// Close the active sub-menu if there's a click anywhere outside itself.
	window.document.addEventListener("click", function(event) {

		// Get the current active sub-menu.
		const activeMenu = document.querySelector(".sub-menu-active");

		// Get the active sub-menu when a click is registered inside that sub-menu.
		const clickedInsideMenu = event.target.closest(".sub-menu-active");

		// If the "outside" sub-menu click is just its toggle link, let the toggle do its job.
		if (event.target.parentNode === activeMenu) {
			event.stopPropagation();
		}

		// If there's an active sub-menu and there's a verified "outside" sub-menu click, close the active sub-menu.
		if (null !== activeMenu && null === clickedInsideMenu) {
			activeMenu.classList.remove("sub-menu-active");
			const toggleAnchor = activeMenu.querySelector(':scope > a');
			if (toggleAnchor) {
				toggleAnchor.setAttribute('aria-expanded', 'false');
			}
		}
	});

	/**
	 * Mobile navigation toggler
	 *
	 * Credit _s by Automattic for the toggle behavior
	 * https://github.com/automattic/_s
	 */
	const siteNavigation = document.getElementById('site-navigation');

	// Return early if the navigation doesn't exist.
	if (!siteNavigation) {
		return;
	}

	const button = siteNavigation.getElementsByTagName('button')[0];

	// Return early if the button doesn't exist.
	if ('undefined' === typeof button) {
		return;
	}

	const menu = siteNavigation.getElementsByTagName('ul')[0];

	// Hide menu toggle button if menu is empty and return early.
	if ('undefined' === typeof menu) {
		button.style.display = 'none';
		return;
	}

	if (!menu.classList.contains('nav-menu')) {
		menu.classList.add('nav-menu');
	}


	/**
	 * Menu modal behavior
	 */

	// Get the element that wraps menu list, a direct child of the main navigation element.
	// This element will behave as the visible area behind the actual menu modal.
	const menuModalOuter = document.querySelector("#site-navigation > [class*='-container']");

	const menuModalInner = menuModalOuter.querySelector("#primary-menu");
	const closeButton = document.createElement("button");
	closeButton.classList.add('close-menu-modal');
	closeButton.textContent = "Close menu";
	menuModalOuter.prepend(closeButton);

	// Returns all keyboard-focusable elements within a container.
	function getFocusableElements(container) {
		return Array.from(container.querySelectorAll(
			'a[href], button:not([disabled]), input:not([disabled]), textarea:not([disabled]), select:not([disabled]), [tabindex]:not([tabindex="-1"])'
		));
	}

	// Conduct all the tasks required for opening the menu modal.
	button.addEventListener('click', function() {
		siteNavigation.classList.toggle("toggled");
		menuModalOuter.classList.add("menu-modal-active","v-dark-background");

		if (button.getAttribute('aria-expanded') === 'true') {
			button.setAttribute('aria-expanded', 'false');
		} else {
			button.setAttribute('aria-expanded', 'true');
			// Move focus into the modal
			const focusable = getFocusableElements(menuModalOuter);
			if (focusable.length) {
				focusable[0].focus();
			}
		}
	});

	// Conduct all the tasks required for closing the menu modal.
	function closeMenuModal() {
		menuModalOuter.classList.remove("menu-modal-active","v-dark-background");
		siteNavigation.classList.remove("toggled");
		button.setAttribute("aria-expanded", "false");
		button.focus();
	}

	// Close the menu modal if the user clicks the close button.
	closeButton.addEventListener("click", function(event) {
		closeMenuModal();
	});

	// Close the menu modal if the user clicks outside the menu area.
	menuModalOuter.addEventListener("click", function(event) {
		const isClickOutside = !event.target.closest(".nav-menu");
		if (isClickOutside) {
			closeMenuModal();
		}
	});

	// Close the menu modal if the user presses the ESC key.
	window.addEventListener("keydown", (event) => {
		if (event.key === "Escape") {
			closeMenuModal();
		}
	});

	// Trap focus within the modal while it is open.
	menuModalOuter.addEventListener("keydown", function(event) {
		if (event.key !== 'Tab' || !siteNavigation.classList.contains('toggled')) {
			return;
		}

		const focusable = getFocusableElements(menuModalOuter);
		const first = focusable[0];
		const last  = focusable[focusable.length - 1];

		if (event.shiftKey) {
			if (document.activeElement === first) {
				event.preventDefault();
				last.focus();
			}
		} else {
			if (document.activeElement === last) {
				event.preventDefault();
				first.focus();
			}
		}
	});

	/**
	 * Search overlay
	 */
	var searchToggle = document.querySelector('.search-toggle');
	var searchOverlay = document.getElementById('search-overlay');

	if (searchToggle && searchOverlay) {
		var searchInput = searchOverlay.querySelector('.search-field');
		var searchClose = searchOverlay.querySelector('.search-overlay-close');

		function openSearch() {
			searchOverlay.classList.add('search-overlay-active');
			searchOverlay.setAttribute('aria-hidden', 'false');
			searchToggle.setAttribute('aria-expanded', 'true');
			if (searchInput) {
				searchInput.focus();
			}
		}

		function closeSearch() {
			searchOverlay.classList.remove('search-overlay-active');
			searchOverlay.setAttribute('aria-hidden', 'true');
			searchToggle.setAttribute('aria-expanded', 'false');
			searchToggle.focus();
		}

		searchToggle.addEventListener('click', openSearch);

		searchToggle.addEventListener('keydown', function(event) {
			if (event.key === 'Enter' || event.key === ' ') {
				event.preventDefault();
				openSearch();
			}
		});

		if (searchClose) {
			searchClose.addEventListener('click', closeSearch);
		}

		// Close on backdrop click (outside the inner form area)
		searchOverlay.addEventListener('click', function(event) {
			if (!event.target.closest('.search-overlay-inner') && !event.target.closest('.search-overlay-close')) {
				closeSearch();
			}
		});

		// Close on Escape
		window.addEventListener('keydown', function(event) {
			if (event.key === 'Escape' && searchOverlay.classList.contains('search-overlay-active')) {
				closeSearch();
			}
		});
	}

}());
;/**
 * Add a class to the site header (#masthead) if it contains a hero (.site-hero) element
 */
const siteHeader = document.querySelector("#masthead .site-hero");
if (siteHeader) {
	siteHeader.closest('#masthead').classList.add('has-hero');
}

/**
 * Count the number of fat footer areas in use and add an appropriate class to the parent element
 */
const fatFooterAreas = document.querySelector(".fat-footer-areas");
if (fatFooterAreas) {
	const fatFooterAreasCount = fatFooterAreas.childElementCount;
	fatFooterAreas.classList.add(`v-grid-columns_${fatFooterAreasCount}`);
}
