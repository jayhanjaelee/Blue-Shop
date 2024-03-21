<div class="login-container">
  <h1 class="login-header">로그인</h1>
  <form class="login-form" action="/login" method="GET">
    <input type="text" id="id-input" name="user_id" placeholder="아이디를 입력해주세요" required>
    </input>
    <input type="text" id="pw-input" name="password" placeholder="비밀번호를 입력해주세요" required>
    </input>
    <div class="login-form__idpw-find">
      <ul>
        <li class="login-form__id"><a href="#">아이디 찾기</a></li>
        <li class="login-form__pw"><a href="#">비밀번호 찾기</a></li>
      </ul>
    </div>
    <div class="login-register-btn-container">
      <button class="login-btn" type="submit">로그인</button>
      <button class="register-btn" type="button"><a href="/register">회원가입</a></button>
    </div>
  </form>
</div>