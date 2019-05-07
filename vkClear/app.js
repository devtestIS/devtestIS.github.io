const express = require('express')
const bodyParser = require('body-parser')
const { Botact } = require('botact')

const app = express()
const bot = new Botact({
  confirmation: process.env.CONFIRMATION,
  token: process.env.TOKEN
})