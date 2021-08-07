import getScrollParent from "./getScrollParent.d.ts";
import getParentNode from "./getParentNode.d.ts";
import getNodeName from "./getNodeName.d.ts";
import getWindow from "./getWindow.d.ts";
export default function listScrollParents(element, list) {
  if (list === void 0) {
    list = [];
  }

  var scrollParent = getScrollParent(element);
  var isBody = getNodeName(scrollParent) === 'body';
  var target = isBody ? getWindow(scrollParent) : scrollParent;
  var updatedList = list.concat(target);
  return isBody ? updatedList : // $FlowFixMe: isBody tells us target will be an HTMLElement here
  updatedList.concat(listScrollParents(getParentNode(target)));
}
