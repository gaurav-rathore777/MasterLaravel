export default function Home() {
  return (
    <div style={{ padding: "2rem" }}>
      <h1>Next.js JWT Auth Example</h1>
      <p><a href="/login">Login</a></p>
      <p><a href="/dashboard">Dashboard (Protected)</a></p>
    </div>
  );
}
