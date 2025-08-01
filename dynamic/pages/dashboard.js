export async function getServerSideProps({ req }) {
    const cookie = req.headers.cookie || "";
    const res = await fetch("http://localhost:3000/api/profile", {
      headers: { cookie },
    });
  
    if (res.status !== 200) {
      return { redirect: { destination: "/login", permanent: false } };
    }
  
    const data = await res.json();
  
    return {
      props: {
        user: data.user,
      },
    };
  }
  
  export default function Dashboard({ user }) {
    return (
      <div style={{ padding: "2rem" }}>
        <h1>Welcome, {user.username}!</h1>
        <p>This is a protected dashboard.</p>
      </div>
    );
  }
  