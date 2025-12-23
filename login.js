document.getElementById("loginForm").addEventListener("submit", async function (e) {
    e.preventDefault();

    const email = document.getElementById("emailAddress").value;
    const password = document.getElementById("inputPassword").value;

    const response = await fetch("login.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ email, password })
    });

    const result = await response.json();

    document.getElementById("result").innerHTML =
        `<div class="alert alert-${result.status}">${result.message}</div>`;
});
