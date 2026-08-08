<form method="post" action="/reg">
    <input name="login" placeholder="login" />
    <input name="password" placeholder="password" />
    <button>Register</button>
</form>

<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    form {
        width: 500px;
        border: 1px solid black;
        display: flex;
        flex-direction: column;
        gap: 10px;
        padding: 10px;
    }
</style>