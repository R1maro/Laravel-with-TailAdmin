export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at?: string;
    mobile: string;
    is_active: 0 | 1;
    is_admin: 0 | 1;
    mobile_verified_at: null | string;
    created_at: null | string;
}

export type PageProps<
    T extends Record<string, unknown> = Record<string, unknown>
> = T & {
    auth: {
        user: User;
    };
};
