/**
 * Count the number of fat footer areas in use and add a class to the parent element
 */
const fatFooterAreas = document.querySelector(".fat-footer-areas");
const fatFooterAreasCount = fatFooterAreas.childElementCount;
fatFooterAreas.classList.add(`volatyl-grid-columns_${fatFooterAreasCount}`);
