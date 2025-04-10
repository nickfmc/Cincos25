<nav id="site-navigation" class="c-main-navigation" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
   
   <?php 
   gdt_nav_menu( 'main-menu', 'c-main-menu', array(
      'walker' => new Accessible_Nav_Walker()
   )); 
   ?>

   <button class="order-button" aria-haspopup="true" aria-expanded="false">Order Online</button>
   

   
</nav>




<div class="order-modal" role="dialog" aria-hidden="true">
       <div class="modal-content">
         <button class="close-button" aria-label="Close modal">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
               <line x1="18" y1="6" x2="6" y2="18"></line>
               <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
         </button>
           <!-- Step 1: Location Selection -->
           <div class="modal-content-wrapper">
              <div class="location-selection">
                  <h2 class="h4-style">Select a Location</h2>
                  <div class="location-options">
                  <button class="location-btn" data-location="dover">
                          <h3 class="h4-style">Dover</h3>
                          <p><strong>446 Central Avenue</strong></p>
                          <p>Mon - Thu: 11am to 10pm<br />
Fri & Sat: 11am to 11pm<br />
Sun: 11am to 9pm</p>
                      </button>
                      
                      <button class="location-btn" data-location="epping">
                          <h3 class="h4-style">Epping</h3>
                          <p><strong>1 Brickyard Square</strong></p>
                          <p>Mon - Thu: 11am to 9pm<br />
Fri & Sat: 11am to 10pm<br />
Sun: 11am to 9pm</p>
                      </button>
              
                    
              
                      <button class="location-btn" data-location="rochester">
                          <h3 class="h4-style">Rochester</h3>
                          <p><strong>22 So. Main Street</strong></p>
                          <p>Mon - Thu: 11am to 10pm<br />
Fri & Sat: 11am to 11pm<br />
Sun: 11am to 9pm</p>
                      </button>

                      <button class="location-btn  location-btn--gc" data-location="gift-cards">
                          <h3 class="h4-style">Gift Cards</h3>
                          <p><strong>Order Online</strong></p>
                        </button>

                  </div>
              </div>
              <!-- Step 2: Order Type Selection -->
              <div class="order-type-selection hidden">
                  <button class="back-button">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M19 12H5M12 19l-7-7 7-7"/>
                      </svg>
                      Back
                  </button>
                  <h2 class="h4-style">How would you like to receive your order?</h2>
             <div class="order-options">
                 <a href="#" class="option-btn" data-type="pickup">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                         <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                         <polyline points="9 22 9 12 15 12 15 22"></polyline>
                     </svg>
                     Pickup
                 </a>
                 <a href="#" class="option-btn delivery-link" data-type="delivery">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                         <rect x="1" y="3" width="15" height="13"></rect>
                         <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                         <circle cx="5.5" cy="18.5" r="2.5"></circle>
                         <circle cx="18.5" cy="18.5" r="2.5"></circle>
                     </svg>
                     Delivery
                 </a>
             </div>
             
              </div>
           </div>
       </div>
   </div>