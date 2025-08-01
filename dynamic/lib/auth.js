import jwt from "jsonwebtoken";

const SECRET = "super-secret-key"; // Use env variable in real apps

export const createToken = (payload) => {
  return jwt.sign(payload, SECRET, { expiresIn: "1h" });
};

export const verifyToken = (token) => {
  try {
    return jwt.verify(token, SECRET);
  } catch (err) {
    return null;
  }
};
