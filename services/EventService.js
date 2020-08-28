import axios from 'axios'

const githubApiClient = axios.create({
  baseURL: `https://api.github.com`,
  withCredentials: false,
  headers: {
    Accept: 'application/json',
    'Content-Type': 'application/json',
  },
})

const apiClient = axios.create({
  withCredentials: false,
  headers: {
    Accept: 'application/json',
    'Content-Type': 'application/json',
  },
})

export default {
  getUser() {
    return githubApiClient.get('/users/devtestIS')
  },
  sendEmail(data) {
    return apiClient.post('/.netlify/functions/email', data)
  },
}
