import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';

dayjs.extend(relativeTime);

export function diffForHumans(date) {
    if (!date){
        return null;
    }

    return dayjs(date).fromNow();
}
