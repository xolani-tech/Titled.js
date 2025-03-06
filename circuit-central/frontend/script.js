// THESE ARE MY API's

// Fetch read_admin_users
async function fetchData() {
    try {
      const response = await fetch('http://localhost/php-lessons/circuit-central/backend/admin_users/read_admin_user.php', {
        method: 'GET', // Explicitly specifying GET
      });
  
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
  
      const data = await response.json();
      console.log(data[1].Name); // Display: Xolani Sodam
      console.log(data); // Display: all of the data as an array
      
      
    } catch (error) {
      console.error('Error:', error);
    }
  }
  
  fetchData();


// //  Fetch read_desktops

// async function fetchData() {
//     try {
//       const response = await fetch('https://api.example.http://localhost/php-lessons/MODULE03PROJECTWEEK/backend/desktops/read_desktops.php/data', {
//         method: 'GET', // Explicitly specifying GET
//       });
  
//       if (!response.ok) {
//         throw new Error('Network response was not ok');
//       }
  
//       const data = await response.json();
//       console.log(data);
      
//     } catch (error) {
//       console.error('Error:', error);
//     }
//   }
  
//   fetchData();
  


// // Fetch read_laptops

// async function fetchData() {
//     try {
//       const response = await fetch('http://localhost/php-lessons/MODULE03PROJECTWEEK/backend/laptops/read_laptops.php', {
//         method: 'GET', // Explicitly specifying GET
//       });
  
//       if (!response.ok) {
//         throw new Error('Network response was not ok');
//       }
  
//       const data = await response.json();
//       console.log(data);
      
//     } catch (error) {
//       console.error('Error:', error);
//     }
//   }
  
//   fetchData();
  
// // Fetch read_users
// async function fetchData() {
//     try {
//       const response = await fetch('http://localhost/php-lessons/MODULE03PROJECTWEEK/backend/users/read_user.php', {
//         method: 'GET', // Explicitly specifying GET
//       });
  
//       if (!response.ok) {
//         throw new Error('Network response was not ok');
//       }
  
//       const data = await response.json();
//       console.log(data);
      
//     } catch (error) {
//       console.error('Error:', error);
//     }
//   }
  
//   fetchData();
  


// async function fetchData() {
//     try {
//         const response = await fetch('http://localhost/php-lessons/MODULE03PROJECTWEEK/backend/admin_users/read_admin_user.php', {
//             method: 'GET', // or 'POST', 'PUT', etc. as needed
//             headers: {
//                 'Content-Type': 'application/json',
//                 // Add any other headers you need here
//             },
//             mode: 'cors' // This is where you specify CORS
//         });

//         if (!response.ok) {
//             throw new Error("Could not fetch resource");
//         }

//         const data = await response.json();
//         console.log(data);
//     } catch (error) {
//         console.error(error);
//     }
// }

// fetchData();

