/**
 * GutenDevTheme scripts (footer)
 * This file contains any js scripts you want added to the theme's footer. 
 */

// *********************** START CUSTOM JS *********************************

// // grab element for Headroom
// var headroomElement = document.querySelector("#c-page-header");
// console.log(headroomElement);

// // get height of element for Headroom
// var headerHeight = headroomElement.offsetHeight; 
// console.log(headerHeight);

// // construct an instance of Headroom, passing the element
// var headroom = new Headroom(headroomElement, {
//   "offset": headerHeight,
//   "tolerance": 5,
//   "classes": {
//     "initial": "animate__animated",
//     "pinned": "animate__slideInDown",
//     "unpinned": "animate__slideOutUp"
//   }
// });
// headroom.init();

// *********************** END CUSTOM JS *********************************



document.getElementById('open-modal-nav').addEventListener('click', function(){
  document.querySelector('html').classList.add('has-modal-nav-open');
});

document.getElementById('close-modal-nav').addEventListener('click', function(){
  document.querySelector('html').classList.remove('has-modal-nav-open');
});

// Close modal nav when clicking outside of it when it already open
  document.addEventListener('click', function(e){
    var isClickOnButton = e.target.closest('#open-modal-nav') !== null;
    var isClickInsideModal = e.target.closest('.c-modal-nav-wrap') !== null;
    var isModalOpen = document.querySelector('html').classList.contains('has-modal-nav-open');

    if (!isClickOnButton && !isClickInsideModal && isModalOpen) {
      document.querySelector('html').classList.remove('has-modal-nav-open');
    }
  });

    // Close modal nav when pressing the escape key
    document.addEventListener('keydown', function(e){
      if (e.key === 'Escape') {
        document.querySelector('html').classList.remove('has-modal-nav-open');
      }
    });


     // Trap focus inside the modal nav
  function trapFocus(element) {
    var focusableElements = element.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
    var firstFocusableElement = focusableElements[0];
    var lastFocusableElement = focusableElements[focusableElements.length - 1];
  
    firstFocusableElement.focus();
  
    element.addEventListener('keydown', function(e) {
      var isTabPressed = e.key === 'Tab' || e.keyCode === 9;
  
      if (!isTabPressed) {
        return; 
      }
  
      if (e.shiftKey) { // if shift key pressed for shift + tab combination
        if (document.activeElement === firstFocusableElement) {
          lastFocusableElement.focus(); // add focus for the last focusable element
          e.preventDefault();
        }
      } else { // if tab key is pressed
        if (document.activeElement === lastFocusableElement) { // if focused has reached to last focusable element then focus first focusable element after pressing tab
          firstFocusableElement.focus(); // add focus for the first focusable element
          e.preventDefault();
        }
      }
    });
  }
  var modalNavWrap = document.querySelector('.c-modal-nav-wrap');
  trapFocus(modalNavWrap);



// SLIDING VERSION ////////////////////
// Get all the menu items that have a submenu
// var menuItems = document.querySelectorAll('.c-mobile-menu .menu-item-has-children');

// // Loop through the menu items
// menuItems.forEach(function(menuItem) {
//   // Get the link inside the menu item
//   var link = menuItem.querySelector('a');

//   // Clone the link
//   var clonedLink = link.cloneNode(true);

//   // Get the submenu inside the menu item
//   var submenu = menuItem.querySelector('.sub-menu');

//   // Insert the cloned link at the top of the submenu
//   submenu.insertBefore(clonedLink, submenu.firstChild);

//   // Add a click event listener to the original link
//   link.addEventListener('click', function(event) {
//     // Prevent the link from navigating to the href
//     event.preventDefault();

//     // Add the 'open' class to the submenu
//     submenu.classList.add('open');
//   });

//   // Add a back button to the submenu
//   var backButton = document.createElement('button');

//   // Create the SVG icon
// var svgIcon = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
// svgIcon.setAttribute('xmlns', 'http://www.w3.org/2000/svg');
// svgIcon.setAttribute('width', '1em');
// svgIcon.setAttribute('height', '1em');
// svgIcon.setAttribute('viewBox', '0 0 24 24');
// var path = document.createElementNS('http://www.w3.org/2000/svg', 'path');
// path.setAttribute('fill', 'currentColor');
// path.setAttribute('d', 'm16.41 18.16l-5.66-5.66l5.66-5.66l.7.71l-4.95 4.95l4.95 4.95zm-4 0L6.75 12.5l5.66-5.66l.7.71l-4.95 4.95l4.95 4.95z');

// svgIcon.appendChild(path);

// // Append the SVG icon to the button
// backButton.appendChild(svgIcon);

// // Add text content to the button
// var buttonText = document.createTextNode(' Back');
// backButton.appendChild(buttonText);
//   backButton.addEventListener('click', function() {
//     // Remove the 'open' class from the submenu
//     submenu.classList.remove('open');
//   });
//   submenu.insertBefore(backButton, submenu.firstChild);
// });
// SLIDING VERSION ////////////////////



/// Get all the menu items that have a submenu
var menuItems = document.querySelectorAll('.c-mobile-menu .menu-item-has-children');

// Loop through the menu items
menuItems.forEach(function(menuItem) {
  // Get the link inside the menu item
  var link = menuItem.querySelector('a');

  // Add a click event listener to the original link
  link.addEventListener('click', function(event) {
    // Prevent the link from navigating to the href
    event.preventDefault();
    
    // Close all other menu items except for ancestors of the clicked item
    menuItems.forEach(function(otherMenuItem) {
      if (otherMenuItem !== menuItem && !menuItem.contains(otherMenuItem) && !otherMenuItem.contains(menuItem)) {
        otherMenuItem.classList.remove('is-open');
        var otherSubmenu = otherMenuItem.querySelector('.sub-menu');
        if (otherSubmenu) {
          otherSubmenu.style.height = null;
          otherSubmenu.classList.remove('open');
        }
      }
    });
    
    // Toggle the 'open' class on the submenu
    var submenu = menuItem.querySelector('.sub-menu');
    submenu.classList.toggle('open');
    
    // Toggle the 'is-open' class on the menu item
    menuItem.classList.toggle('is-open');
  });
});






// better accessible dropdown menu
document.addEventListener('DOMContentLoaded', function() {
    const dropdownButtons = document.querySelectorAll('.dropdown-toggle');
    
    dropdownButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !isExpanded);
            
            // Toggle submenu visibility
            const submenu = this.parentElement.querySelector('ul');
            if (submenu) {
                submenu.classList.toggle('is-active');
            }
        });
    });
    
    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.menu-item-has-children')) {
            dropdownButtons.forEach(button => {
                button.setAttribute('aria-expanded', 'false');
                const submenu = button.parentElement.querySelector('ul');
                if (submenu) {
                    submenu.classList.remove('is-active');
                }
            });
        }
    });
});
//END better accessible dropdown menu


// external link accessibility script
class AccessibilityEnhancer {
  constructor() {
      this.newTabText = '(Opens in a new tab)';
      this.externalLinkText = '(External link)';
      this.pdfText = '(PDF file)'; 
  }

  enhanceLinks() {
      const links = document.querySelectorAll('a');
      
      links.forEach(link => {
          this.enhanceSingleLink(link);
      });
  }

  enhanceSingleLink(link) {
    const isNewTab = link.target === '_blank' || link.target === 'blank';
    const isExternal = this.isExternalLink(link);
    const isPDF = this.isPDFLink(link); // Add this line
    const existingLabel = link.getAttribute('aria-label');
    const linkText = link.textContent || link.innerText;
    
    let newLabel = existingLabel || linkText;

    // Add appropriate notices
    if (isNewTab && !newLabel.includes(this.newTabText)) {
        newLabel += ` ${this.newTabText}`;
    }
    if (isExternal && !newLabel.includes(this.externalLinkText)) {
        newLabel += ` ${this.externalLinkText}`;
    }
    if (isPDF && !newLabel.includes(this.pdfText)) { // Add this block
        newLabel += ` ${this.pdfText}`;
    }

      // Set the enhanced label
      if (newLabel !== linkText) {
          link.setAttribute('aria-label', newLabel.trim());
      }

      // Add security attributes for external links
      if (isNewTab || isExternal) {
          const rel = 'noopener noreferrer';
          const currentRel = link.getAttribute('rel');
          if (!currentRel || !currentRel.includes(rel)) {
              link.setAttribute('rel', rel);
          }
      }
  }

  isExternalLink(link) {
      if (!link.href) return false;
      
      const currentDomain = window.location.hostname;
      try {
          const linkDomain = new URL(link.href).hostname;
          return linkDomain !== currentDomain;
      } catch (e) {
          return false;
      }
  }

  isPDFLink(link) {
      if (!link.href) return false;
      
      // Check if the URL ends with .pdf
      if (link.href.toLowerCase().endsWith('.pdf')) return true;
      
      // Check if the MIME type is available and is PDF
      if (link.type && link.type.toLowerCase() === 'application/pdf') return true;
      
      // Check if the download attribute exists and the file ends with .pdf
      if (link.hasAttribute('download')) {
          const downloadValue = link.getAttribute('download');
          if (downloadValue && downloadValue.toLowerCase().endsWith('.pdf')) return true;
      }
      
      return false;
  }
  

  // Method to handle dynamically added content
  observe() {
      const observer = new MutationObserver((mutations) => {
          mutations.forEach(mutation => {
              mutation.addedNodes.forEach(node => {
                  if (node.nodeType === 1) { // ELEMENT_NODE
                      // Check the added element itself
                      if (node.tagName === 'A') {
                          this.enhanceSingleLink(node);
                      }
                      // Check for links within the added element
                      const links = node.querySelectorAll('a');
                      links.forEach(link => this.enhanceSingleLink(link));
                  }
              });
          });
      });

      observer.observe(document.body, {
          childList: true,
          subtree: true
      });
  }
}

// Usage
const accessibilityEnhancer = new AccessibilityEnhancer();

document.addEventListener('DOMContentLoaded', () => {
  accessibilityEnhancer.enhanceLinks();
  accessibilityEnhancer.observe(); // Optional: observe for dynamic content
});
// END external link accessibility script






document.addEventListener('DOMContentLoaded', function() {
    const modal = document.querySelector('.order-modal');
    const locationSelection = document.querySelector('.location-selection');
    const orderTypeSelection = document.querySelector('.order-type-selection');
    const locationButtons = document.querySelectorAll('.location-btn');
    const backButton = document.querySelector('.back-button');
    const deliveryLink = document.querySelector('.delivery-link');
    
    let selectedLocation = '';
    
    // Open modal
    const orderButtons = document.querySelectorAll('.order-button');

    orderButtons.forEach(button => {
      button.addEventListener('click', function() {
          // Check if this is the mobile nav order button
          if (button.classList.contains('order-button-mobilenav')) {
              // Remove the mobile nav open class
              document.querySelector('html').classList.remove('has-modal-nav-open');
          }
          
          // Then show the order modal
          modal.style.display = 'block';
          modal.setAttribute('aria-hidden', 'false');
      });
  });

    // Close modal when clicking outside
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeModal();
        }
    });

    // Location selection
    locationButtons.forEach(button => {
        button.addEventListener('click', function() {
          // Check if this is the gift cards button
        if (this.dataset.location === 'gift-cards') {
          // Redirect directly to gift cards URL
          window.location.href = 'https://www.toasttab.com/cincos-cantina-epping/giftcards?utm_source=undefined&utm_content=online--cincos-cantina-epping&utm_medium=toast_sites&utm_campaign=giftcards';
          return; // Exit the function early
      }
            selectedLocation = this.dataset.location;
            
            // Update delivery link based on location
            const deliveryUrls = {
                'epping': 'https://order.online/store/cinco\'s-cantina-epping-923337/?delivery=true&hideModal=true',
                'dover': 'https://order.online/store/cinco\'s-cantina-dover-548156/?delivery=true&hideModal=true',
                'rochester': 'https://order.online/store/cinco\'s-cantina-rochester-30715928/?delivery=true&hideModal=true'
            };

            const pickupUrls = {
                'epping': 'https://order.toasttab.com/online/cincos-cantina-epping',
                'dover': 'https://order.toasttab.com/online/cincos-cantina-dover',
                'rochester': 'https://order.toasttab.com/online/cincos-cantina-rochester'
            };

                 // Update both links' href attributes
        deliveryLink.href = deliveryUrls[selectedLocation];
        const pickupLink = document.querySelector('.option-btn[data-type="pickup"]');
        pickupLink.href = pickupUrls[selectedLocation];
        
        // Update pickup/delivery text
        pickupLink.textContent = `Pickup from ${selectedLocation.charAt(0).toUpperCase() + selectedLocation.slice(1)}`;
        deliveryLink.textContent = `Delivery from ${selectedLocation.charAt(0).toUpperCase() + selectedLocation.slice(1)}`;
        
        // Show order type selection
        locationSelection.classList.add('hidden');
        orderTypeSelection.classList.remove('hidden');
        });
    });

    // Back button
    backButton.addEventListener('click', function() {
        orderTypeSelection.classList.add('hidden');
        locationSelection.classList.remove('hidden');
    });

    // Pickup button
    document.querySelector('.option-btn[data-type="pickup"]').addEventListener('click', function() {
        // Handle pickup logic here
        console.log(`Pickup selected for ${selectedLocation}`);
    });

    // Close button
    document.querySelector('.close-button').addEventListener('click', function() {
        closeModal();
    });
    

    function closeModal() {
        modal.style.display = 'none';
        modal.setAttribute('aria-hidden', 'true');
        // Reset to first screen
        orderTypeSelection.classList.add('hidden');
        locationSelection.classList.remove('hidden');
    }
});






// *********************** START CUSTOM JQUERY DOC READY SCRIPTS *******************************
jQuery( document ).ready(function( $ ) {

    var swiper = new Swiper(".swiper", {
        modules: [SwiperGL],
        effect: "gl",
        gl: { shader: "peel-x" },
        speed: 1500,
        // navigation: {
        //   prevEl: ".swiper-button-prev",
        //   nextEl: ".swiper-button-next",
        // },
        autoplay: { enabled: true },
      });
   // get Template URL
   var templateUrl = object_name.templateUrl;
   

  //  $('#mobile-nav').hcOffcanvasNav({
  //   disableAt: 1024,
  //   width: 280,
  //   customToggle: $('.toggle'),
  //    pushContent: '.menu-slide',
  //   levelTitles: true,
  //   position: 'right',
  //   levelOpen: 'expand',
  //   navTitle: $('<div class="c-mobile-menu-header"><a href="/"><img src="'+ templateUrl + '/img/logo.svg"></a></div>'),
  //   levelTitleAsBack: true
  // });


  // modal menu init ----------------------------------
  // var modal_menu = jQuery("#c-modal-nav-button").animatedModal({
  //   modalTarget: 'modal-navigation',
  //   animatedIn: 'slideInDown',
  //   animatedOut: 'slideOutUp',
  //   animationDuration: '0.40s',
  //   color: '#dedede',
  //   afterClose: function() {
  //     $( 'body, html' ).css({ 'overflow': '' });
  //   }
  // });

  // // get last and current hash + update on hash change
  // var currentHash = function() {
  //   return location.hash.replace(/^#/, '')
  // }
  // var last_hash
  // var hash = currentHash()
  // $(window).bind('hashchange', function(event) {
  //   last_hash = hash;
  //   hash = currentHash();
  // });

  // enable back/foward to close/open modal --------------------------
  // $("#c-modal-nav-button").on('click', function(){ window.location.href = ensureHash("#menu"); });
  // function ensureHash(newHash) {
  //   if (window.location.hash) {
  //     return window.location.href.substring(0, window.location.href.lastIndexOf(window.location.hash)) + newHash;
  //   }
  //   return window.location.hash + newHash;
  // }
  // // if back button is pressed, close the modal
  // $(window).on('hashchange', function (event) {
  //   if (last_hash == 'menu' && hash == '') {
  //     modal_menu.close();
  //     history.replaceState('', document.title, window.location.pathname);
  //   } // if forward button, open the modal
  //   else if (window.location.hash == "#menu"){
  //     modal_menu.open();
  //   }
  // });

  // // if close button is clicked, clear the #menu hash added above
  // $('.close-modal-navigation').on('click', function (e) {
  //   history.replaceState('', document.title, window.location.pathname);
  // });

  // // close modal menu if esc key is used ------------------------
  // $(document).keyup(function(ev){
  //   if(ev.keyCode == 27 && hash == 'menu') {
  //     window.history.back();
  //   }
  // });


  // Magnific as menu popup
  // MENU POPUP
  // $('#c-modal-nav-button').magnificPopup({
  //   type: 'inline',
  //   removalDelay: 700, //delay removal by X to allow out-animation
  //   showCloseBtn: false,
  //   closeOnBgClick: false,
  //   autoFocusLast: false,
  //   fixedContentPos: false, 
  //   fixedContentPos: true,
  //   callbacks: {
  //     beforeOpen: function() {
  //        this.st.mainClass = 'mfp-move-from-side menu-popup';
  //        $('body').addClass('mfp-active');
  //     },
  //     open: function() { 
  //       $('#close-modal, .close-modal-navigation').on('click',function(event){
  //         event.preventDefault();
  //         $.magnificPopup.close(); 
  //       }); 
  //   },
  //   beforeClose: function() {
  //   $('body').removeClass('mfp-active');
  // }
  //   },
  //   midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
  // });

});
// *********************** END CUSTOM JQUERY DOC READY SCRIPTS *********************************
