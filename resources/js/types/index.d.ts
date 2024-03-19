import { Config } from 'ziggy-js';

export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at: string;
    profile_image_url: string;
}

export interface Product {
    id: number;
    name: string;
    description: string;
    image_url: string;
    price: number;
}

export interface PaginationLink {
    url: string;
    label: string;
    active: boolean;
}

export interface Pagination {
    links: Array<PaginationLink>;
    data: Array<object>;
}

export type PageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
    auth: {
        user: User;
    };
    ziggy: Config & { location: string };
};
