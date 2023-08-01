interface Product {
  id: number;
  title: string;
  description: string;
  type: string;
  price: number;
  status: string;
  address: string;
  space: number;
  room: number;
  bath: number;
  furnished: number;
  city_id: number;
  street: string;
  medias: Media[];
  created_at: string;
  updated_at: string;
}

interface Media {
  id: number;
  name: string;
  extension: string;
  size: number;
  url: string;
  created_at: string;
  updated_at: string;
}

interface Meta {
  current_page: number,
  from: number,
  last_page: number,
  links: [{
    url: string,
    label: string,
    active: boolean,
  }],
  path: string,
  per_page: number,
  to: number,
  total: number,
}