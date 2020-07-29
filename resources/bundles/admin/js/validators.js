/**
 * Check if given value is array
 *
 * @param { any } value
 * @return { Boolean }
 */
export const isArray = (value) => {
  return Array.isArray(value);
};

/**
 * Check if given value is boolean
 *
 * @param {any} value
 * @return {boolean}
 */
export const isBoolean = (value) => {
  switch (typeof value) {
    case "boolean":
      return true;
    case "string":
      return (value === "0" || value === "1");
    case "number":
      return (value === 0 || value === 1);
    default:
      return false;
  }
};

/**
 * Check if given value is string
 *
 * @param {any} value
 * @return {boolean}
 */
export const isString = (value) => {
  return typeof value === 'string';
};
