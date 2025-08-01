import { createToken } from "../../lib/auth";
import cookie from "cookie";

export default function handler(req, res) {
  if (req.method !== "POST") return res.status(405).end();

  const { username, password } = req.body;

  // Mock user
  if (username === "admin" && password === "admin123") {
    const token = createToken({ username });
    res.setHeader(
      "Set-Cookie",
      cookie.serialize("token", token, {
        httpOnly: true,
        secure: process.env.NODE_ENV !== "development",
        maxAge: 3600,
        sameSite: "strict",
        path: "/",
      })
    );
    res.status(200).json({ message: "Logged in" });
  } else {
    res.status(401).json({ message: "Invalid credentials" });
  }
}
