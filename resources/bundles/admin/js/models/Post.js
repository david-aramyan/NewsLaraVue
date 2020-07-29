import Restify from "vue-restify";

export class Post extends Restify {
  static fields = {
    id: null,
    title: '',
    text: '',
    image: ''
  };

  constructor() {
    super(Post.fields);
  }
}
