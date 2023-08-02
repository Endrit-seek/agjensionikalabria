const route = (id?: number, page?: number) => `/api/products${id ? `/${id}` : `${page ? `?page=${page}` : ''}`}`;

const index = async (page?: number) => {
  const { data } = await useApiFetch<IndexProductResponse>(route(undefined, page), { method: 'GET' });
  if (data.value) {
    return data.value;
  }
  return {} as IndexProductResponse;
}

const show = async (id: number) => {
  const { data } = await useApiFetch<ProductResponse>(route(id), { method: 'GET' });
  
  if (data.value && data.value.data) {
    return data.value.data;
  }
  return {} as Product;
}

const store = async (body: any) => {
  const { data } = await useApiFetch(route(), { method: 'POST', body });

  return data;
}

const update = async (body: any) => {
  const { data } = await useApiFetch(route(), { method: 'PATCH', body });

  return data;
}

const destroy = async (id: number) => {
  const { data } = await useApiFetch(route(id), { method: 'DELETE' });

  return data;
}


export const useProduct = () => ({
  index, show, store, update, destroy
})

interface ProductResponse {
  data: Product
}

interface IndexProductResponse {
  data: Product[]
  meta: Meta
}