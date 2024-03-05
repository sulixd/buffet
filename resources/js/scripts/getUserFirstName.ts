import {User} from "@/types";

export default function getUserFirstName(user: User): string {
    const name = user.name.split(' ');
    return name[1];
}
