import getCompositeRect from "./getCompositeRect.d.ts";
import getWindow from "./getWindow.d.ts";
import getDocumentElement from "./getDocumentElement.d.ts";
import getWindowScroll from "./getWindowScroll.d.ts";
export default function getDocumentRect(element) {
  var win = getWindow(element);
  var winScroll = getWindowScroll(element);
  var documentRect = getCompositeRect(getDocumentElement(element), win);
  documentRect.height = Math.max(documentRect.height, win.innerHeight);
  documentRect.width = Math.max(documentRect.width, win.innerWidth);
  documentRect.x = -winScroll.scrollLeft;
  documentRect.y = -winScroll.scrollTop;
  return documentRect;
}
