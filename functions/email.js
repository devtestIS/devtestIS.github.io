const nodemailer = require('nodemailer')
const { MAIL_LOGIN, MAIL_PASS, MAIL_SERVICE } = process.env

const main = async (data) => {
  const transporter = nodemailer.createTransport({
    service: MAIL_SERVICE,
    auth: {
      user: MAIL_LOGIN,
      pass: MAIL_PASS,
    },
  })

  const { name, sender, text } = data

  const info = await transporter.sendMail({
    from: sender,
    to: MAIL_LOGIN,
    subject: `Сообщение от ${name}`,
    text,
    html: `<p>${text}</p>`,
  })

  return info.messageId
}

exports.handler = async (event, context) => {
  if (event.httpMethod !== 'POST') {
    return { statusCode: 405, body: 'Method Not Allowed' }
  }

  const data = JSON.parse(event.body)
  await main(data)
  return {
    statusCode: 200,
    body: 'Сообщение отправлено',
  }
}
