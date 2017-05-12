const express = require('express')
const bodyParser = require('body-parser')
const MongoClient = require('mongodb').MongoClient
const app = express()
var phpnode = require('./index.js')({bin:"c:\\php\\php.exe"});
app.use(bodyParser.urlencoded({extended:true}))
app.set('view engine', 'ejs')
app.use(express.static('public'))
app.use(bodyParser.json())
app.engine('php', phpnode)

app.get('/store', (req,res) => {
  db.collection('libros').find().toArray((err,result) => {
    //renders index.ejs
    res.render('store', {libros:result})
  })
})


var db

MongoClient.connect('mongodb://admin:mexcritores@ds115411.mlab.com:15411/mexcritores', (err, database) => {
  if (err) return console.log(err)
  db = database
  app.listen(8000, () => {
    console.log('listening on 8000')
  })
})
