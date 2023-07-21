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
  city: string;
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