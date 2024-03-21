<div class="register-container">
  <h1 class="register__header">회원가입</h1>
  <div class="register__required">
    <span class="register__asterisk">*</span>필수입력사항
  </div>

  <form class="register__form" action="/api/user/register" method="POST">
    <div class="register__items">
      <div class="register__item">
        <div class="register__title">
          <span class="register__asterisk">*</span>
          <label for="id">아이디</label>
        </div>
        <input class="register__item-input" id="user_id" type="text" name="user_id" placeholder="아이디를 입력해주세요"
          autocomplete="on" required>
        <button class="user-id-dup-check-btn btn" type="button">중복확인</button>
      </div>
      <div class="register__item">
        <div class="register__title">
          <span class="register__asterisk">*</span>
          <label for="password">비밀번호</label>
        </div>
        <input type="text" name="password" placeholder="비밀번호를 입력해주세요" required>
      </div>
      <div class="register__item">
        <div class="register__title">
          <span class="register__asterisk">*</span>
          <label for="re_password">비밀번호 확인</label>
        </div>
        <input type="text" name="re_password" placeholder="비밀번호를 한번 더 입력해주세요" required>
      </div>
      <div class="register__item">
        <div class="register__title">
          <span class="register__asterisk">*</span>
          <label for="name">이름</label>
        </div>
        <input type="text" name="name" placeholder="이름을 입력해주세요" autocomplete="on" required>
      </div>
      <div class="register__item">
        <div class="register__title">
          <!-- <span class="register__asterisk">*</span> -->
          <label for="email">이메일</label>
        </div>
        <input type="text" name="email" placeholder="foo@examle.com" autocomplete="on">
        <button class="btn" type="button">중복확인</button>
      </div>
      <div class="register__item">
        <div class="register__title">
          <!-- <span class="register__asterisk">*</span> -->
          <label for="mobile_phone">휴대폰</label>
        </div>
        <input type="text" name="mobile_phone" placeholder="숫자만 입력해주세요" autocomplete="on">
        <button class="btn btn--disabled" type="button">인증번호 받기</button>
      </div>
      <div class="register__item">
        <div class="register__title">
          <!-- <span class="register__asterisk">*</span> -->
          <label for="address">주소</label>
        </div>
        <input type="text" name="address" placeholder="ex: OOO도 OO시 OOO로" autocomplete="on">
        <button class="btn" type="button">중복확인</button>
      </div>
    </div>
    <div class="register__form-btn-container">
      <button class="register__form-btn btn" type="submit">가입하기</button>
    </div>
  </form>
</div>