const route = (id?: number) => `/api/cities${id ? `/${id}` : ''}`;

const index = async ()=> {
  const { data } = await useApiFetch<CityResponse>(route(), { method: 'GET'});

  return data.value?.data;
}

export const useCity = () => ({
  index
})


interface CityResponse {
  data: City[]
}