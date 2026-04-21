CREATE TABLE IF NOT EXISTS "VendorBankDetails" (
    "Id" INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    "VendorId" TEXT NOT NULL,
    "BankName" TEXT NOT NULL,
    "AccountHolderName" TEXT NOT NULL,
    "AccountNumber" TEXT NOT NULL,
    "IFSCCode" TEXT NOT NULL,
    "BranchName" TEXT NULL,
    "CancelledChequeImage" TEXT NULL,
    "IsActive" BOOLEAN NOT NULL DEFAULT TRUE,
    "CreatedDate" TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);
