const express = require('express');
const app=express();
const path = require('path');
app.set('port', process.env.PORT || 3000);
app.listen(app.get('port'));


app.get('', (req,res)=>{
  res.sendFile(path.join(__dirname, '../index.html'));
});

app.get('/what', (req,res)=>{
  res.sendFile(path.join(__dirname, '../what.html'));
});
app.get('/who', (req,res)=>{
  res.sendFile(path.join(__dirname, '../who.html'));
});
app.get('/media', (req,res)=>{
  res.sendFile(path.join(__dirname, '../media.html'));
});
app.get('/media', (req,res)=>{
  res.sendFile(path.join(__dirname, '../media.html'));
});
app.get('/donate', (req,res)=>{
  res.sendFile(path.join(__dirname, '../donate.html'));
});
app.get('/calendar', (req,res)=>{
  res.sendFile(path.join(__dirname, '../calendar.html'));
});



app.use(express.static(path.join(__dirname,'../')));


