import axios from "axios";

const apiClient = axios.create({
  baseUrl: "https://app.msrvbattle.ru",
  headers: {
    Accept: "application/json",
    "Content-Type": "application/json"
  }
});

export default {
  getList(start) {
    return apiClient
      .get(
        `https://app.msrvbattle.ru/tournaments/games/v2/?start=${start}&gameCode=f533d4be-5b8e-11e9-8647-d663bd873d93&max=15&includePaid=true`
      )
      .then(response => response.data);
  }
};
