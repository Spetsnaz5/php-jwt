### 簡介
```
JSON Web Token (JWT) 是一種開放標準（RFC 7519） 基於 JSON 輕量級資料交換格式，

採用無狀態 (stateless) 設計，不需在伺服器端保存會話資料，常用於身份認證與授權或不同系統間交換資訊
```

### 結構
```
JWT 字串由三部分組成，格式為 Header.Payload.Signature​，用小數點隔開，
```

- Header（標頭）：定義簽章所使用演算法與類型，由 Base64URL 編碼

- Payload（負載）：包含各種聲明 (claims)，即實際要傳遞的資料​。可包含標準欄位也可自訂欄位，由 Base64URL 編碼

- Signature（簽章）：對編碼後的 Header 和 Payload 使用指定算法及祕鑰計算所得的簽名​，驗證其中資訊是否被竄改。
 
### 各段結構常見欄位
- Header：主要有 typ（令牌類型，通常為 "JWT"）和 alg（簽名演算法，例如 HS256、RS256 等）​

- Payload：包括多種聲明 (claims)​，也可加入自訂欄位，例如用戶名 (name)、角色 (role) 等
  - iss (Issuer)：簽發者
  - sub (Subject)：主題/使用者
  - aud (Audience)：受眾，指令牌發送對象
  - exp (Expiration Time)：過期時間（Unix 時間戳）
  - nbf (Not Before)：生效時間戳
  - iat (Issued At)：簽發時間戳
  - jti (JWT ID)：令牌唯一識別符

- Signature：計算方式 signature = HMACSHA256( base64UrlEncode(header) + "." + base64UrlEncode(payload), secret )

