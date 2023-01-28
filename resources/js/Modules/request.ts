export default function request(path: string, options = {}) {
  const url = `http://localhost:8000/${path.replace(/^\/+/, '')}`;

  return fetch(url, options).then((response) => response.json());
}

export function get(path: string, options = {}) {
  return request(path, { ...options, method: 'GET' });
}

export function post(path: string, options = {}) {
  return request(path, { ...options, method: 'POST' });
}

export function put(path: string, options = {}) {
  return request(path, { ...options, method: 'PUT' });
}

export function patch(path: string, options = {}) {
  return request(path, { ...options, method: 'PATCH' });
}

export function destroy(path: string, options = {}) {
  return request(path, { ...options, method: 'DELETE' });
}

export function head(path: string, options = {}) {
  return request(path, { ...options, method: 'HEAD' });
}
