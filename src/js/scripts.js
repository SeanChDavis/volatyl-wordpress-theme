/**
 * Add a class to the  site header (#masthead) if it contains a hero (.site-hero) element
 */
const siteHeader = document.querySelector("#masthead .site-hero");
if (siteHeader) {
	siteHeader.closest('#masthead').classList.add('has-hero');
}

/**
 * Count the number of fat footer areas in use and add an appropriate class to the parent element
 */
const fatFooterAreas = document.querySelector(".fat-footer-areas");
const fatFooterAreasCount = fatFooterAreas.childElementCount;
fatFooterAreas.classList.add(`v-grid-columns_${fatFooterAreasCount}`);
