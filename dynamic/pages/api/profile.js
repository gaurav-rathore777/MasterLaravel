import { verifyToken } from "../../lib/auth";
import cookie from "cookie";

export default function handler(req, res) {
  const { token } = cookie.parse(req.headers.cookie || "");

  const user = verifyToken(token);
  if (!user) return res.status(401).json({ message: "Unauthorized" });

  res.status(200).json({ user });
}
