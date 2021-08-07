import { isElement } from "./instanceOf.d.ts";
export default function getDocumentElement(element) {
  // $FlowFixMe: assume body is always available
  return (isElement(element) ? element.ownerDocument : element.document).documentElement;
}
