  // Select the navbar inside the header
  let navbar = document.querySelector('.header .navbar');

  // Select the account box inside the header
 let accountBox = document.querySelector('.header .account-box');

  // When the menu button(three bars icon) is clicked
 document.querySelector('#menu-btn').onclick = () =>{

   // Toggle the 'active' class for the navbar (show/hide it)
    navbar.classList.toggle('active');

    // Remove 'active' class from account box (hide it if it's open)
    accountBox.classList.remove('active');
 }
  // When the user button (user icon) is clicked
 document.querySelector('#user-btn').onclick = () =>{

   // Toggle the 'active' class for the account box (show/hide it)
    accountBox.classList.toggle('active');

    // Remove 'active' class from navbar (hide it if it's open)
    navbar.classList.remove('active');
 }
 
  // When the user scrolls the page
window.onscroll = () =>{

     // Hide the navbar when scrolling
      navbar.classList.remove('active');

      //Hide the account box when scrolling
      accountBox.classList.remove('active');
}

document.querySelector('#close-update').onclick = () =>{
  document.querySelector('.edit-book-form').style.display = 'none';
  window.location.href = 'admin_books.php';
}

