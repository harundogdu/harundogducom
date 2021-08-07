import getBoundingClientRect from "./getBoundingClientRect.d.ts";
import getNodeScroll from "./getNodeScroll.d.ts";
import getNodeName from "./getNodeName.d.ts";
import { isHTMLElement } from "./instanceOf.d.ts";
import getWindowScrollBarX from "./getWindowScrollBarX.d.ts";
import getDocumentElement from "./getDocumentElement.d.ts"; // Returns the composite rect of an element relative to its offsetParent.
// Composite means it takes into account transforms as well as layout.

export default function getCompositeRect(elementOrVirtualElement, offsetParent, isFixed) {
  if (isFixed === void 0) {
    isFixed = false;
  }

  var documentElement;
  var rect = getBoundingClientRect(elementOrVirtualElement);
  var scroll = {
    scrollLeft: 0,
    scrollTop: 0
  };
  var offsets = {
    x: 0,
    y: 0
  };

  if (!isFixed) {
    if (getNodeName(offsetParent) !== 'body') {
      scroll = getNodeScroll(offsetParent);
    }

    if (isHTMLElement(offsetParent)) {
      offsets = getBoundingClientRect(offsetParent);
      offsets.x += offsetParent.clientLeft;
      offsets.y += offsetParent.clientTop;
    } else if (documentElement = getDocumentElement(offsetParent)) {
      offsets.x = getWindowScrollBarX(documentElement);
    }
  }

  return {
    x: rect.left + scroll.scrollLeft - offsets.x,
    y: rect.top + scroll.scrollTop - offsets.y,
    width: rect.width,
    height: rect.height
  };
}
