<form method="post" action="/login">
    <a href="/login">Login</a>
    <?php if (isset($msg)): ?>
        <div class="msg"><?= htmlspecialchars($msg); ?></div>
    <?php endif; ?>
    <?php if (isset($error)): ?>
        <div class="error"><?= htmlspecialchars($error); ?></div>
    <?php endif; ?>
    <input name="login" placeholder="login" />
    <input name="password" placeholder="password" />
    <button>Login</button>
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

    .msg {
        color: blue;
    }
    .error {
        color: red;
    }
</style>