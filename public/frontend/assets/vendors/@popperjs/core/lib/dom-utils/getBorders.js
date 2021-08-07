import getComputedStyle from "./getComputedStyle.d.ts";
import { isHTMLElement } from "./instanceOf.d.ts";

function toNumber(cssValue) {
  return parseFloat(cssValue) || 0;
}

export default function getBorders(element) {
  var computedStyle = isHTMLElement(element) ? getComputedStyle(element) : {};
  return {
    top: toNumber(computedStyle.borderTopWidth),
    right: toNumber(computedStyle.borderRightWidth),
    bottom: toNumber(computedStyle.borderBottomWidth),
    left: toNumber(computedStyle.borderLeftWidth)
  };
}
