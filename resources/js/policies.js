export default {
    modify(user, answer) {
      return user.id === answer.author_id;
    }
}
