
# V1 Payment Tax

V1PaymentTax

## Structure

`V1PaymentTax`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `errors` | [`?(Error[])`](../../doc/models/error.md) | Optional | Any errors that occurred during the request. | getErrors(): ?array | setErrors(?array errors): void |
| `name` | `?string` | Optional | The merchant-defined name of the tax. | getName(): ?string | setName(?string name): void |
| `appliedMoney` | [`?V1Money`](../../doc/models/v1-money.md) | Optional | - | getAppliedMoney(): ?V1Money | setAppliedMoney(?V1Money appliedMoney): void |
| `rate` | `?string` | Optional | The rate of the tax, as a string representation of a decimal number. A value of 0.07 corresponds to a rate of 7%. | getRate(): ?string | setRate(?string rate): void |
| `inclusionType` | [`?string(V1PaymentTaxInclusionType)`](../../doc/models/v1-payment-tax-inclusion-type.md) | Optional | - | getInclusionType(): ?string | setInclusionType(?string inclusionType): void |
| `feeId` | `?string` | Optional | The ID of the tax, if available. Taxes applied in older versions of Square Register might not have an ID. | getFeeId(): ?string | setFeeId(?string feeId): void |

## Example (as JSON)

```json
{
  "errors": [
    {
      "category": "MERCHANT_SUBSCRIPTION_ERROR",
      "code": "MAP_KEY_LENGTH_TOO_LONG",
      "detail": "detail6",
      "field": "field4"
    }
  ],
  "name": "name6",
  "applied_money": {
    "amount": 196,
    "currency_code": "IQD"
  },
  "rate": "rate4",
  "inclusion_type": "ADDITIVE"
}
```

