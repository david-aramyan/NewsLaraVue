import Restify from "vue-restify";

export class News extends Restify {
  static fields = {
    id: null,
    title: '',
    text: '',
    image: null
  };

  rules = {
    title: {
      required: true,
      string: true,
      max: 255
    },
    text: {
      required: true,
      string: true,
    },
    image: {
      required: true,
      image: true
    }
  };

  formdata = true;

  constructor(defaults = {}) {
    super(Object.assign({}, News.fields, defaults));
  }
}
