const route = (id?: number) => `/api/cities${id ? `/${id}` : ''}`;

const index = async ()=> {
  const { data } = await useApiFetch<CityResponse>(route(), { method: 'GET'});

  if (data.value && data.value.data) {
    return data.value.data;
  }
  return [] as City[];
}

export const useCity = () => ({
  index
})


interface CityResponse {
  data: City[]
}