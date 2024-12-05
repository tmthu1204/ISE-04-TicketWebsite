const express = require('express');
const app = express();
const handlebars = require('express-handlebars');
const path = require('path');

// Set up Handlebars as the view engine
app.engine('handlebars', handlebars.engine());
app.set('view engine', 'handlebars');

app.use(express.static('../views/public'));
// Set the correct path to the 'views' directory
app.set('views', path.join(__dirname, 'views'));  // Ensure this is correct

// Your route handler
app.get('/', (req, res) => {
  res.render('home');  // This will look for home.handlebars inside the 'views' directory
});

// Start the server
app.listen(3000, () => {
  console.log('Server is running on port 3000');
});
