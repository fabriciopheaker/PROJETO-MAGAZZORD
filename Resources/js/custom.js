

async function getDados(uri, parametros = {}) {

  const requestURL = window.location.href + `${uri}`;
  try {
    const response = await axios.get(requestURL, {
      headers: {
        'X-Requested-With': 'XMLHttpRequest',
      },
      params: parametros
    });

    return response.data;
  } catch (error) {
    console.error(error.response);
    throw error; // Rejeitar a promessa para que os chamadores possam lidar com o erro, se necessário
  }
}



async function PostDados(uri, parametros = {}) {
  const requestURL = window.location.href + `${uri}`;
  try {
    const response = await axios.post(requestURL, parametros, {
      headers: {
        'X-Requested-With': 'XMLHttpRequest',
      }
    });

    return response;
  } catch (error) {
    return error.response
  }
}


