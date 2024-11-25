const path = require('path')
const express = require('express')
const app = express()
const handlebars = require('express-handlebars')
const port = 3000

app.use(express.static(path.join('../views/public')));
//template engine
app.engine('handlebars', handlebars.engine());
app.set('view engine','handlebars')
// app.set('views', path.join(__dirname, '.\\resources\\views'));

app.set('views', path.join(__dirname, 'views/views'));
console.log('./views/public')

app.get('/', (req, res) => {
  res.render('home')
})
