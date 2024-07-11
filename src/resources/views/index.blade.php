<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Form</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <a class="header__logo" href="/">
        FashionablyLate
      </a>
    </div>
  </header>

  <main>
    <div class="contact-form__content">
      <div class="contact-form__heading">
        <h2>Contact</h2>
      </div>
      <form class="form" action="/contacts/confirm" method="post">
        @csrf
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お名前</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text name-inputs">
              <input type="name" name="last_name" placeholder="例: 山田" value="{{ old('last_name') }}" />
              <input type="name" name="first_name" placeholder="例: 太郎" value="{{ old('first_name') }}" />
            </div>
            <div class="form__error">
              @error('last_name')
              {{ $message }}
              @enderror
              @error('first_name')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>
        
        <!-- 性別追加 -->
        <div class="form__group">
  <div class="form__group-title">
    <span class="form__label--item">性別</span>
    <span class="form__label--required">※</span>
  </div>
  <div class="form__group-content">
    <div class="form__input--radio">
      <input type="radio" name="gender" value="男性" id="male" {{ old('gender') == '男性' ? 'checked' : '' }}>
      <label for="male">男性</label>
      <input type="radio" name="gender" value="女性" id="female" {{ old('gender') == '女性' ? 'checked' : '' }}>
      <label for="female">女性</label>
      <input type="radio" name="gender" value="その他" id="other" {{ old('gender') == 'その他' ? 'checked' : '' }}>
      <label for="other">その他</label>
    </div>
    <div class="form__error">
      @error('gender')
      {{ $message }}
      @enderror
    </div>
  </div>
</div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">メールアドレス</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="email" name="email" placeholder="test@example.com" value="{{ old('email') }}" />
            </div>
            <div class="form__error">
              @error('email')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">電話番号</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text tell-inputs">
              <input type="tell" name="tel1" placeholder="080" value="{{ old('tel1') }}" maxlength="3" />
              <span class="tell-separator">-</span>
              <input type="tell" name="tel2" placeholder="1234" value="{{ old('tel2') }}" maxlength="4" />
              <span class="tell-separator">-</span>
              <input type="tell" name="tel3" placeholder="5678" value="{{ old('tel3') }}" maxlength="4" />
            </div>
            <div class="form__error">
              @error('tel1')
              {{ $message }}
              @enderror
              @error('tel2')
              {{ $message }}
              @enderror
              @error('tel3')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">住所</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
               <input type="address" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" />
            </div>
            <div class="form__error">
              @error('address')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">建物名</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
               <input type="building" name="building" placeholder="例:千駄ヶ谷マンション101" value="{{ old('building') }}" />
            </div>
            <div class="form__error">
              @error('building')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お問い合わせの種類</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--select">
              <select name="category_id">
                <option value="">選択してください</option>
                @foreach($categories as $category)
                  <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                  </option>
                @endforeach
              </select>
            </div>
            <div class="form__error">
              @error('category_id')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お問い合わせ内容</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--textarea">
              <textarea name="content" placeholder="お問い合わせ内容をご記入ください" value="{{ old('content') }}"></textarea>
            </div>
            <div class="form__error">
              @error('content')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>
        <div class="form__button">
          <button class="form__button-submit" type="submit">確認画面</button>
        </div>
      </form>
    </div>
  </main>
</body>

</html>