const CLIENT_TOKEN_KEY = "token";

export const getToken = () => {
  return window.localStorage.getItem(CLIENT_TOKEN_KEY);
};

export const saveToken = token => {
  window.localStorage.setItem(CLIENT_TOKEN_KEY, token);
};

export const destroyToken = () => {
  window.localStorage.removeItem(CLIENT_TOKEN_KEY);
};

export default { getToken, saveToken, destroyToken};
