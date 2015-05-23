<?php
/*
Plugin Name: Restaurateur Inc. Profit Calculator
Plugin URI: http://rrtpos.com
Description: Breakeven
Version: 1.1
Author: admin@louiedogg.com
Author URI: http://louiedogg.com
*/



/***This is the table Display for the Breakeven***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	
variables

$title
$even
$over1
$over2
$over3
$over4
$over4

$salesTitle
$currency_symbol
$percentage_symbol

$monthlySalesTitle
$monthlySales
$monthlySalesPercent
$even_monthlySales
$even_monthlySalesPercent
$over1_monthlySales
$over1_monthlySalesPercent
$over2_monthlySales
$over2_monthlySalesPercent
$over3_monthlySales
$over3_monthlySalesPercent
$over4_monthlySales
$over4_monthlySalesPercent
$over5_monthlySales
$over5_monthlySalesPercent

$weeklySalesTitle
$weeklySales
$weeklySalesPercent
$even_weeklySales
$even_weeklySalesPercent
$over1_weeklySales
$over1_weeklySalesPercent
$over2_weeklySales
$over2_weeklySalesPercent
$over3_weeklySales
$over3_weeklySalesPercent
$over4_weeklySales
$over4_weeklySalesPercent
$over5_weeklySales
$over5_weeklySalesPercent

$dailySalesTitle
$dailySales
$dailySalesPercent
$even_dailySales
$even_dailySalesPercent
$over1_dailySales
$over1_dailySalesPercent
$over2_dailySales
$over2_dailySalesPercent
$over3_dailySales
$over3_dailySalesPercent
$over4_dailySales
$over4_dailySalesPercent
$over5_dailySales
$over5_dailySalesPercent



$cogsTitle

$foodCostTitle
$foodCost
$foodCostPercent
$even_foodCost
$even_foodCostPercent
$over1_foodCost
$over1_foodCostPercent
$over2_foodCost
$over2_foodCostPercent
$over3_foodCost
$over3_foodCostPercent
$over4_foodCost
$over4_foodCostPercent
$over5_foodCost
$over5_foodCostPercent

$beerCostTitle
$beerCost
beerCostPercent
even_beerCost
even_beerCostPercent
over1_beerCost
over1_beerCostPercent
over2_beerCost
over2_beerCostPercent
over3_beerCost
over3_beerCostPercent
over4_beerCost
over4_beerCostPercent
over5_beerCost
over5_beerCostPercent

wineCostTitle
wineCost
wineCostPercent
even_wineCost
even_wineCostPercent
over1_wineCost
over1_wineCostPercent
over2_wineCost
over2_wineCostPercent
over3_wineCost
over3_wineCostPercent
over4_wineCost
over4_wineCostPercent
over5_wineCost
over5_wineCostPercent

liquorCostTitle
liquorCost
liquorCostPercent
even_liquorCost
even_liquorCostPercent
over1_liquorCost
over1_liquorCostPercent
over2_liquorCost
over2_liquorCostPercent
over3_liquorCost
over3_liquorCostPercent
over4_liquorCost
over4_liquorCostPercent
over5_liquorCost
over5_liquorCostPercent

deliveryCostTitle
deliveryCost
deliveryCostPercent
even_deliveryCost
even_deliveryCostPercent
over1_deliveryCost
over1_deliveryCostPercent
over2_deliveryCost
over2_deliveryCostPercent
over3_deliveryCost
over3_deliveryCostPercent
over4_deliveryCost
over4_deliveryCostPercent
over5_deliveryCost
over5_deliveryCostPercent

cogsTotalTitle
cogsTotal
cogsTotalPercent
even_cogsTotal
even_cogsTotalPercent
over1_cogsTotal
over1_cogsTotalPercent
over2_cogsTotal
over2_cogsTotalPercent
over3_cogsTotal
over3_cogsTotalPercent
over4_cogsTotal
over4_cogsTotalPercent
over5_cogsTotal
over5_cogsTotalPercent


laborTitle

generalManagerTitle
generalManager
generalManagerPercent
even_generalManager
even_generalManagerPercent
over1_generalManager
over1_generalManagerPercent
over2_generalManager
over2_generalManagerPercent
over3_generalManager
over3_generalManagerPercent
over4_generalManager
over4_generalManagerPercent
over5_generalManager
over5_generalManagerPercent

kitchenManagerTitle
kitchenManager
kitchenManagerPercent
even_kitchenManager
even_kitchenManagerPercent
over1_kitchenManager
over1_kitchenManagerPercent
over2_kitchenManager
over2_kitchenManagerPercent
over3_kitchenManager
over3_kitchenManagerPercent
over4_kitchenManager
over4_kitchenManagerPercent
over5_kitchenManager
over5_kitchenManagerPercent


asstManagerTitle
asstManager
asstManagerPercent
even_asstManager
even_asstManagerPercent
over1_asstManager
over1_asstManagerPercent
over2_asstManager
over2_asstManagerPercent
over3_asstManager
over3_asstManagerPercent
over4_asstManager
over4_asstManagerPercent
over5_asstManager
over5_asstManagerPercent

wagesHourlyFOHTitle
wagesHourlyFOH
wagesHourlyFOHPercent
even_wagesHourlyFOH
even_wagesHourlyFOHPercent
over1_wagesHourlyFOH
over1_wagesHourlyFOHPercent
over2_wagesHourlyFOH
over2_wagesHourlyFOHPercent
over3_wagesHourlyFOH
over3_wagesHourlyFOHPercent
over4_wagesHourlyFOH
over4_wagesHourlyFOHPercent
over5_wagesHourlyFOH
over5_wagesHourlyFOHPercent

wagesHourlyBOHTitle
wagesHourlyBOH
wagesHourlyBOHPercent
even_wagesHourlyBOH
even_wagesHourlyBOHPercent
over1_wagesHourlyBOH
over1_wagesHourlyBOHPercent
over2_wagesHourlyBOH
over2_wagesHourlyBOHPercent
over3_wagesHourlyBOH
over3_wagesHourlyBOHPercent
over4_wagesHourlyBOH
over4_wagesHourlyBOHPercent
over5_wagesHourlyBOH
over5_wagesHourlyBOHPercent

wagesHourlyUtilityTitle
wagesHourlyUtility
wagesHourlyUtilityPercent
even_wagesHourlyUtility
even_wagesHourlyUtilityPercent
over1_wagesHourlyUtility
over1_wagesHourlyUtilityPercent
over2_wagesHourlyUtility
over2_wagesHourlyUtilityPercent
over3_wagesHourlyUtility
over3_wagesHourlyUtilityPercent
over4_wagesHourlyUtility
over4_wagesHourlyUtilityPercent
over5_wagesHourlyUtility
over5_wagesHourlyUtilityPercent

wagesMiscTitle
wagesMisc
wagesMiscPercent
even_wagesMisc
even_wagesMiscPercent
over1_wagesMisc
over1_wagesMiscPercent
over2_wagesMisc
over2_wagesMiscPercent
over3_wagesMisc
over3_wagesMiscPercent
over4_wagesMisc
over4_wagesMiscPercent
over5_wagesMisc
over5_wagesMiscPercent

totalDirectLaborTitle
totalDirectLabor
totalDirectLaborPercent
even_totalDirectLabor
even_totalDirectLaborPercent
over1_totalDirectLabor
over1_totalDirectLaborPercent
over2_totalDirectLabor
over2_totalDirectLaborPercent
over3_totalDirectLabor
over3_totalDirectLaborPercent
over4_totalDirectLabor
over4_totalDirectLaborPercent
over5_totalDirectLabor
over5_totalDirectLaborPercent


bonusTitle
bonus
bonusPercent
even_bonus
even_bonusPercent
over1_bonus
over1_bonusPercent
over2_bonus
over2_bonusPercent
over3_bonus
over3_bonusPercent
over4_bonus
over4_bonusPercent
over5_bonus
over5_bonusPercent

hTexpenseTitle
hTexpense
hTexpensePercent
even_hTexpense
even_hTexpensePercent
over1_hTexpense
over1_hTexpensePercent
over2_hTexpense
over2_hTexpensePercent
over3_hTexpense
over3_hTexpensePercent
over4_hTexpense
over4_hTexpensePercent
over5_hTexpense
over5_hTexpensePercent

payrollTitle
payroll
payrollPercent
even_payroll
even_payrollPercent
over1_payroll
over1_payrollPercent
over2_payroll
over2_payrollPercent
over3_payroll
over3_payrollPercent
over4_payroll
over4_payrollPercent
over5_payroll
over5_payrollPercent


benefitsTitle
benefits
benefitsPercent
even_benefits
even_benefitsPercent
over1_benefits
over1_benefitsPercent
over2_benefits
over2_benefitsPercent
over3_benefits
over3_benefitsPercent
over4_benefits
over4_benefitsPercent
over5_benefits
over5_benefitsPercent



totalLaborTitle
totalLabor
totalLaborPercent
even_totalLabor
even_totalLaborPercent
over1_totalLabor
over1_totalLaborPercent
over2_totalLabor
over2_totalLaborPercent
over3_totalLabor
over3_totalLaborPercent
over4_totalLabor
over4_totalLaborPercent
over5_totalLabor
over5_totalLaborPercent


opExpenseTitle

bankServiceFeesTitle
bankServiceFees
bankServiceFeesPercent
even_bankServiceFees
even_bankServiceFeesPercent
over1_bankServiceFees
over1_bankServiceFeesPercent
over2_bankServiceFees
over2_bankServiceFeesPercent
over3_bankServiceFees
over3_bankServiceFeesPercent
over4_bankServiceFees
over4_bankServiceFeesPercent
over5_bankServiceFees
over5_bankServiceFeesPercent


outsideServicesTitle
outsideServices
outsideServicesPercent
even_outsideServices
even_outsideServicesPercent
over1_outsideServices
over1_outsideServicesPercent
over2_outsideServices
over2_outsideServicesPercent
over3_outsideServices
over3_outsideServicesPercent
over4_outsideServices
over4_outsideServicesPercent
over5_outsideServices
over5_outsideServicesPercent


repairMainTitle
repairMain
repairMainPercent
even_repairMain
even_repairMainPercent
over1_repairMain
over1_repairMainPercent
over2_repairMain
over2_repairMainPercent
over3_repairMain
over3_repairMainPercent
over4_repairMain
over4_repairMainPercent
over5_repairMain
over5_repairMainPercent

overShortTitle
overShort
overShortPercent
even_overShort
even_overShortPercent
over1_overShort
over1_overShortPercent
over2_overShort
over2_overShortPercent
over3_overShort
over3_overShortPercent
over4_overShort
over4_overShortPercent
over5_overShort
over5_overShortPercent

suppliesOperationTitle
suppliesOperation
suppliesOperationPercent
even_suppliesOperation
even_suppliesOperationPercent
over1_suppliesOperation
over1_suppliesOperationPercent
over2_suppliesOperation
over2_suppliesOperationPercent
over3_suppliesOperation
over3_suppliesOperationPercent
over4_suppliesOperation
over4_suppliesOperationPercent
over5_suppliesOperation
over5_suppliesOperationPercent

suppliesOfficeTitle
suppliesOffice
suppliesOfficePercent
even_suppliesOffice
even_suppliesOfficePercent
over1_suppliesOffice
over1_suppliesOfficePercent
over2_suppliesOffice
over2_suppliesOfficePercent
over3_suppliesOffice
over3_suppliesOfficePercent
over4_suppliesOffice
over4_suppliesOfficePercent
over5_suppliesOffice
over5_suppliesOfficePercent

suppliesPostageTitle
suppliesPostage
suppliesPostagePercent
even_suppliesPostage
even_suppliesPostagePercent
over1_suppliesPostage
over1_suppliesPostagePercent
over2_suppliesPostage
over2_suppliesPostagePercent
over3_suppliesPostage
over3_suppliesPostagePercent
over4_suppliesPostage
over4_suppliesPostagePercent
over5_suppliesPostage
over5_suppliesPostagePercent

suppliesSmallwaresTitle
suppliesSmallwares
suppliesSmallwaresPercent
even_suppliesSmallwares
even_suppliesSmallwaresPercent
over1_suppliesSmallwares
over1_suppliesSmallwaresPercent
over2_suppliesSmallwares
over2_suppliesSmallwaresPercent
over3_suppliesSmallwares
over3_suppliesSmallwaresPercent
over4_suppliesSmallwares
over4_suppliesSmallwaresPercent
over5_suppliesSmallwares
over5_suppliesSmallwaresPercent


linenTitle
linen
linenPercent
even_linen
even_linenPercent
over1_linen
over1_linenPercent
over2_linen
over2_linenPercent
over3_linen
over3_linenPercent
over4_linen
over4_linenPercent
over5_linen
over5_linenPercent

pestTitle
pest
pestPercent
even_pest
even_pestPercent
over1_pest
over1_pestPercent
over2_pest
over2_pestPercent
over3_pest
over3_pestPercent
over4_pest
over4_pestPercent
over5_pest
over5_pestPercent

deliveryTitle
delivery
deliveryPercent
even_delivery
even_deliveryPercent
over1_delivery
over1_deliveryPercent
over2_delivery
over2_deliveryPercent
over3_delivery
over3_deliveryPercent
over4_delivery
over4_deliveryPercent
over5_delivery
over5_deliveryPercent

telephoneTitle
telephone
telephonePercent
even_telephone
even_telephonePercent
over1_telephone
over1_telephonePercent
over2_telephone
over2_telephonePercent
over3_telephone
over3_telephonePercent
over4_telephone
over4_telephonePercent
over5_telephone
over5_telephonePercent

internetTitle
internet
internetPercent
even_internet
even_internetPercent
over1_internet
over1_internetPercent
over2_internet
over2_internetPercent
over3_internet
over3_internetPercent
over4_internet
over4_internetPercent
over5_internet
over5_internetPercent

utilitiesElectricTitle
utilitiesElectric
utilitiesElectricPercent
even_utilitiesElectric
even_utilitiesElectricPercent
over1_utilitiesElectric
over1_utilitiesElectricPercent
over2_utilitiesElectric
over2_utilitiesElectricPercent
over3_utilitiesElectric
over3_utilitiesElectricPercent
over4_utilitiesElectric
over4_utilitiesElectricPercent
over5_utilitiesElectric
over5_utilitiesElectricPercent

utilitiesGasTitle
utilitiesGas
utilitiesGasPercent
even_utilitiesGas
even_utilitiesGasPercent
over1_utilitiesGas
over1_utilitiesGasPercent
over2_utilitiesGas
over2_utilitiesGasPercent
over3_utilitiesGas
over3_utilitiesGasPercent
over4_utilitiesGas
over4_utilitiesGasPercent
over5_utilitiesGas
over5_utilitiesGasPercent

utilitiesWaterTitle
utilitiesWater
utilitiesWaterPercent
even_utilitiesWater
even_utilitiesWaterPercent
over1_utilitiesWater
over1_utilitiesWaterPercent
over2_utilitiesWater
over2_utilitiesWaterPercent
over3_utilitiesWater
over3_utilitiesWaterPercent
over4_utilitiesWater
over4_utilitiesWaterPercent
over5_utilitiesWater
over5_utilitiesWaterPercent

cableTitle
cable
cablePercent
even_cable
even_cablePercent
over1_cable
over1_cablePercent
over2_cable
over2_cablePercent
over3_cable
over3_cablePercent
over4_cable
over4_cablePercent
over5_cable
over5_cablePercent

securityTitle
security
securityPercent
even_security
even_securityPercent
over1_security
over1_securityPercent
over2_security
over2_securityPercent
over3_security
over3_securityPercent
over4_security
over4_securityPercent
over5_security
over5_securityPercent

entKarTitle
entKar
entKarPercent
even_entKar
even_entKarPercent
over1_entKar
over1_entKarPercent
over2_entKar
over2_entKarPercent
over3_entKar
over3_entKarPercent
over4_entKar
over4_entKarPercent
over5_entKar
over5_entKarPercent

miscUnknownTitle
miscUnknown
miscUnknownPercent
even_miscUnknown
even_miscUnknownPercent
over1_miscUnknown
over1_miscUnknownPercent
over2_miscUnknown
over2_miscUnknownPercent
over3_miscUnknown
over3_miscUnknownPercent
over4_miscUnknown
over4_miscUnknownPercent
over5_miscUnknown
over5_miscUnknownPercent

totalopExpenseTitle
totalopExpense
totalopExpensePercent
even_totalopExpense
even_totalopExpensePercent
over1_totalopExpense
over1_totalopExpensePercent
over2_totalopExpense
over2_totalopExpensePercent
over3_totalopExpense
over3_totalopExpensePercent
over4_totalopExpense
over4_totalopExpensePercent
over5_totalopExpense
over5_totalopExpensePercent

othExpenseTitle

accountTitle
account
accountPercent
even_account
even_accountPercent
over1_account
over1_accountPercent
over2_account
over2_accountPercent
over3_account
over3_accountPercent
over4_account
over4_accountPercent
over5_account
over5_accountPercent

legalTitle
legal
legalPercent
even_legal
even_legalPercent
over1_legal
over1_legalPercent
over2_legal
over2_legalPercent
over3_legal
over3_legalPercent
over4_legal
over4_legalPercent
over5_legal
over5_legalPercent

mortRentTitle
mortRent
mortRentPercent
even_mortRent
even_mortRentPercent
over1_mortRent
over1_mortRentPercent
over2_mortRent
over2_mortRentPercent
over3_mortRent
over3_mortRentPercent
over4_mortRent
over4_mortRentPercent
over5_mortRent
over5_mortRentPercent

tripleNTitle
tripleN
tripleNPercent
even_tripleN
even_tripleNPercent
over1_tripleN
over1_tripleNPercent
over2_tripleN
over2_tripleNPercent
over3_tripleN
over3_tripleNPercent
over4_tripleN
over4_tripleNPercent
over5_tripleN
over5_tripleNPercent

invLoanPayTitle
invLoanPay
invLoanPayPercent
even_invLoanPay
even_invLoanPayPercent
over1_invLoanPay
over1_invLoanPayPercent
over2_invLoanPay
over2_invLoanPayPercent
over3_invLoanPay
over3_invLoanPayPercent
over4_invLoanPay
over4_invLoanPayPercent
over5_invLoanPay
over5_invLoanPayPercent

insuranceTitle
insurance
insurancePercent
even_insurance
even_insurancePercent
over1_insurance
over1_insurancePercent
over2_insurance
over2_insurancePercent
over3_insurance
over3_insurancePercent
over4_insurance
over4_insurancePercent
over5_insurance
over5_insurancePercent


licensePermitsTitle
licensePermits
licensePermitsPercent
even_licensePermits
even_licensePermitsPercent
over1_licensePermits
over1_licensePermitsPercent
over2_licensePermits
over2_licensePermitsPercent
over3_licensePermits
over3_licensePermitsPercent
over4_licensePermits
over4_licensePermitsPercent
over5_licensePermits
over5_licensePermitsPercent



bOtaxesTitle
bOtaxes
bOtaxesPercent
even_bOtaxes
even_bOtaxesPercent
over1_bOtaxes
over1_bOtaxesPercent
over2_bOtaxes
over2_bOtaxesPercent
over3_bOtaxes
over3_bOtaxesPercent
over4_bOtaxes
over4_bOtaxesPercent
over5_bOtaxes
over5_bOtaxesPercent


creditCardFeesTitle
creditCardFees
creditCardFeesPercent
even_creditCardFees
even_creditCardFeesPercent
over1_creditCardFees
over1_creditCardFeesPercent
over2_creditCardFees
over2_creditCardFeesPercent
over3_creditCardFees
over3_creditCardFeesPercent
over4_creditCardFees
over4_creditCardFeesPercent
over5_creditCardFees
over5_creditCardFeesPercent


royaltiesTitle
royalties
royaltiesPercent
even_royalties
even_royaltiesPercent
over1_royalties
over1_royaltiesPercent
over2_royalties
over2_royaltiesPercent
over3_royalties
over3_royaltiesPercent
over4_royalties
over4_royaltiesPercent
over5_royalties
over5_royaltiesPercent


totalOtherExpenseTitle
totalOtherExpense
totalOtherExpensePercent
even_totalOtherExpense
even_totalOtherExpensePercent
over1_totalOtherExpense
over1_totalOtherExpensePercent
over2_totalOtherExpense
over2_totalOtherExpensePercent
over3_totalOtherExpense
over3_totalOtherExpensePercent
over4_totalOtherExpense
over4_totalOtherExpensePercent
over5_totalOtherExpense
over5_totalOtherExpensePercent

marketingTitle

newsInTitle
newsIn
newsInPercent
even_newsIn
even_newsInPercent
over1_newsIn
over1_newsInPercent
over2_newsIn
over2_newsInPercent
over3_newsIn
over3_newsInPercent
over4_newsIn
over4_newsInPercent
over5_newsIn
over5_newsInPercent

directMailTitle
directMail
directMailPercent
even_directMail
even_directMailPercent
over1_directMail
over1_directMailPercent
over2_directMail
over2_directMailPercent
over3_directMail
over3_directMailPercent
over4_directMail
over4_directMailPercent
over5_directMail
over5_directMailPercent

doorHangTitle
doorHang
doorHangPercent
even_doorHang
even_doorHangPercent
over1_doorHang
over1_doorHangPercent
over2_doorHang
over2_doorHangPercent
over3_doorHang
over3_doorHangPercent
over4_doorHang
over4_doorHangPercent
over5_doorHang
over5_doorHangPercent

targetMarketTitle
targetMarket
targetMarketPercent
even_targetMarket
even_targetMarketPercent
over1_targetMarket
over1_targetMarketPercent
over2_targetMarket
over2_targetMarketPercent
over3_targetMarket
over3_targetMarketPercent
over4_targetMarket
over4_targetMarketPercent
over5_targetMarket
over5_targetMarketPercent

printingTitle
printing
printingPercent
even_printing
even_printingPercent
over1_printing
over1_printingPercent
over2_printing
over2_printingPercent
over3_printing
over3_printingPercent
over4_printing
over4_printingPercent
over5_printing
over5_printingPercent

vipTitle
vip
vipPercent
even_vip
even_vipPercent
over1_vip
over1_vipPercent
over2_vip
over2_vipPercent
over3_vip
over3_vipPercent
over4_vip
over4_vipPercent
over5_vip
over5_vipPercent

guerSquadTitle
guerSquad
guerSquadPercent
even_guerSquad
even_guerSquadPercent
over1_guerSquad
over1_guerSquadPercent
over2_guerSquad
over2_guerSquadPercent
over3_guerSquad
over3_guerSquadPercent
over4_guerSquad
over4_guerSquadPercent
over5_guerSquad
over5_guerSquadPercent

virtualWorldTitle
virtualWorld
virtualWorldPercent
even_virtualWorld
even_virtualWorldPercent
over1_virtualWorld
over1_virtualWorldPercent
over2_virtualWorld
over2_virtualWorldPercent
over3_virtualWorld
over3_virtualWorldPercent
over4_virtualWorld
over4_virtualWorldPercent
over5_virtualWorld
over5_virtualWorldPercent

foodDiscountTitle
foodDiscount
foodDiscountPercent
even_foodDiscount
even_foodDiscountPercent
over1_foodDiscount
over1_foodDiscountPercent
over2_foodDiscount
over2_foodDiscountPercent
over3_foodDiscount
over3_foodDiscountPercent
over4_foodDiscount
over4_foodDiscountPercent
over5_foodDiscount
over5_foodDiscountPercent

alcoholDiscountTitle
alcoholDiscount
alcoholDiscountPercent
even_alcoholDiscount
even_alcoholDiscountPercent
over1_alcoholDiscount
over1_alcoholDiscountPercent
over2_alcoholDiscount
over2_alcoholDiscountPercent
over3_alcoholDiscount
over3_alcoholDiscountPercent
over4_alcoholDiscount
over4_alcoholDiscountPercent
over5_alcoholDiscount
over5_alcoholDiscountPercent

totalDirectMarketingTitle
totalDirectMarketing
totalDirectMarketingPercent
even_totalDirectMarketing
even_totalDirectMarketingPercent
over1_totalDirectMarketing
over1_totalDirectMarketingPercent
over2_totalDirectMarketing
over2_totalDirectMarketingPercent
over3_totalDirectMarketing
over3_totalDirectMarketingPercent
over4_totalDirectMarketing
over4_totalDirectMarketingPercent
over5_totalDirectMarketing
over5_totalDirectMarketingPercent

nationalAdvertisingTitle
nationalAdvertising
nationalAdvertisingPercent
even_nationalAdvertising
even_nationalAdvertisingPercent
over1_nationalAdvertising
over1_nationalAdvertisingPercent
over2_nationalAdvertising
over2_nationalAdvertisingPercent
over3_nationalAdvertising
over3_nationalAdvertisingPercent
over4_nationalAdvertising
over4_nationalAdvertisingPercent
over5_nationalAdvertising
over5_nationalAdvertisingPercent

regionalCoopAdTitle
regionalCoopAd
regionalCoopAdPercent
even_regionalCoopAd
even_regionalCoopAdPercent
over1_regionalCoopAd
over1_regionalCoopAdPercent
over2_regionalCoopAd
over2_regionalCoopAdPercent
over3_regionalCoopAd
over3_regionalCoopAdPercent
over4_regionalCoopAd
over4_regionalCoopAdPercent
over5_regionalCoopAd
over5_regionalCoopAdPercent


totalMarketingTitle
totalMarketing
totalMarketingPercent
even_totalMarketing
even_totalMarketingPercent
over1_totalMarketing
over1_totalMarketingPercent
over2_totalMarketing
over2_totalMarketingPercent
over3_totalMarketing
over3_totalMarketingPercent
over4_totalMarketing
over4_totalMarketingPercent
over5_totalMarketing
over5_totalMarketingPercent

totalExpenseTitle
totalExpense
totalExpensePercent
even_totalExpense
even_totalExpensePercent
over1_totalExpense
over1_totalExpensePercent
over2_totalExpense
over2_totalExpensePercent
over3_totalExpense
over3_totalExpensePercent
over4_totalExpense
over4_totalExpensePercent
over5_totalExpense
over5_totalExpensePercent

netProfitTitle
netProfit
netProfitPercent
even_netProfit
even_netProfitPercent
over1_netProfit
over1_netProfitPercent
over2_netProfit
over2_netProfitPercent
over3_netProfit
over3_netProfitPercent 
over4_netProfit
over4_netProfitPercent
over5_netProfit
over5_netProfitPercent


*/
function display_breakeven() {

echo '

	<table border="1">
		
		<tr>
			<th colspan="3">'.$title.'</th>
			<th colspan="2">'.$even.'</th>
			<th colspan="2">'.$over1.'</th>
			<th colspan="2">'.$over2.'</th>
			<th colspan="2">'.$over3.'</th>
			<th colspan="2">'.$over4.'</th>
			<th colspan="2">'.$over5.'</th>
		</tr>
		
		<tr>
			<td colspan="1">'.$salesTitle.'</td>
			<td colspan="1">'.$currency_symbol.'</td>
			<td colspan="1">'.$percentage_symbol.'</td>
			<td colspan="1">'.$currency_symbol.'</td>
			<td colspan="1">'.$percentage_symbol.'</td>
			<td colspan="1">'.$currency_symbol.'</td>
			<td colspan="1">'.$percentage_symbol.'</td>
			<td colspan="1">'.$currency_symbol.'</td>
			<td colspan="1">'.$percentage_symbol.'</td>
			<td colspan="1">'.$currency_symbol.'</td>
			<td colspan="1">'.$percentage_symbol.'</td>
			<td colspan="1">'.$currency_symbol.'</td>
			<td colspan="1">'.$percentage_symbol.'</td>
			<td colspan="1">'.$currency_symbol.'</td>
			<td colspan="1">'.$percentage_symbol.'</td>
		</tr>

		<tr>
			<td colspan="1">'.$monthlySalesTitle.'</td>
			<td colspan="1">'.$monthlySales.'</td>
			<td colspan="1">'.$monthlySalesPercent.'</td>
			<td colspan="1">'.$even_monthlySales.'</td>
			<td colspan="1">'.$even_monthlySalesPercent.'</td>
			<td colspan="1">'.$over1_monthlySales.'</td>
			<td colspan="1">'.$over1_monthlySalesPercent.'</td>
			<td colspan="1">'.$over2_monthlySales.'</td>
			<td colspan="1">'.$over2_monthlySalesPercent.'</td>
			<td colspan="1">'.$over3_monthlySales.'</td>
			<td colspan="1">'.$over3_monthlySalesPercent.'</td>
			<td colspan="1">'.$over4_monthlySales.'</td>
			<td colspan="1">'.$over4_monthlySalesPercent.'</td>
			<td colspan="1">'.$over5_monthlySales.'</td>
			<td colspan="1">'.$over5_monthlySalesPercent.'</td>
			
		</tr>	

		<tr>
			<td colspan="1">'.$weeklySalesTitle.'</td>
			<td colspan="1">'.$weeklySales.'</td>
			<td colspan="1">'.$weeklySalesPercent.'</td>
			<td colspan="1">'.$even_weeklySales.'</td>
			<td colspan="1">'.$even_weeklySalesPercent.'</td>
			<td colspan="1">'.$over1_weeklySales.'</td>
			<td colspan="1">'.$over1_weeklySalesPercent.'</td>
			<td colspan="1">'.$over2_weeklySales.'</td>
			<td colspan="1">'.$over2_weeklySalesPercent.'</td>
			<td colspan="1">'.$over3_weeklySales.'</td>
			<td colspan="1">'.$over3_weeklySalesPercent.'</td>
			<td colspan="1">'.$over4_weeklySales.'</td>
			<td colspan="1">'.$over4_weeklySalesPercent.'</td>
			<td colspan="1">'.$over5_weeklySales.'</td>
			<td colspan="1">'.$over5_weeklySalesPercent.'</td>
			
		</tr>	

		<tr>
			<td colspan="1">'.$dailySalesTitle.'</td>
			<td colspan="1">'.$dailySales.'</td>
			<td colspan="1">'.$dailySalesPercent.'</td>
			<td colspan="1">'.$even_dailySales.'</td>
			<td colspan="1">'.$even_dailySalesPercent.'</td>
			<td colspan="1">'.$over1_dailySales.'</td>
			<td colspan="1">'.$over1_dailySalesPercent.'</td>
			<td colspan="1">'.$over2_dailySales.'</td>
			<td colspan="1">'.$over2_dailySalesPercent.'</td>
			<td colspan="1">'.$over3_dailySales.'</td>
			<td colspan="1">'.$over3_dailySalesPercent.'</td>
			<td colspan="1">'.$over4_dailySales.'</td>
			<td colspan="1">'.$over4_dailySalesPercent.'</td>
			<td colspan="1">'.$over5_dailySales.'</td>
			<td colspan="1">'.$over5_dailySalesPercent.'</td>
			
		</tr>	

		<tr>
			<td colspan="1">'.$orderPerDayTitle.'</td>
			<td colspan="2">'.$test.'</td>

		</tr>

		<tr>
			<th colspan="1">'.$cogsTitle.'</th>
			<th colspan="14">'.$test.'</th>

		</tr>
		<tr>
			<td colspan="1">'.$foodCostTitle.'</td>
			<td colspan="1">'.$foodCost.'</td>
			<td colspan="1">'.$foodCostPercent.'</td>
			<td colspan="1">'.$even_foodCost.'</td>
			<td colspan="1">'.$even_foodCostPercent.'</td>
			<td colspan="1">'.$over1_foodCost.'</td>
			<td colspan="1">'.$over1_foodCostPercent.'</td>
			<td colspan="1">'.$over2_foodCost.'</td>
			<td colspan="1">'.$over2_foodCostPercent.'</td>
			<td colspan="1">'.$over3_foodCost.'</td>
			<td colspan="1">'.$over3_foodCostPercent.'</td>
			<td colspan="1">'.$over4_foodCost.'</td>
			<td colspan="1">'.$over4_foodCostPercent.'</td>
			<td colspan="1">'.$over5_foodCost.'</td>
			<td colspan="1">'.$over5_foodCostPercent.'</td>
			
		</tr>	
		<tr>
			<td colspan="1">'.$beerCostTitle.'</td>
			<td colspan="1">'.$beerCost.'</td>
			<td colspan="1">'.$beerCostPercent.'</td>
			<td colspan="1">'.$even_beerCost.'</td>
			<td colspan="1">'.$even_beerCostPercent.'</td>
			<td colspan="1">'.$over1_beerCost.'</td>
			<td colspan="1">'.$over1_beerCostPercent.'</td>
			<td colspan="1">'.$over2_beerCost.'</td>
			<td colspan="1">'.$over2_beerCostPercent.'</td>
			<td colspan="1">'.$over3_beerCost.'</td>
			<td colspan="1">'.$over3_beerCostPercent.'</td>
			<td colspan="1">'.$over4_beerCost.'</td>
			<td colspan="1">'.$over4_beerCostPercent.'</td>
			<td colspan="1">'.$over5_beerCost.'</td>
			<td colspan="1">'.$over5_beerCostPercent.'</td>
			
		</tr>
		<tr>
			<td colspan="1">'.$wineCostTitle.'</td>
			<td colspan="1">'.$wineCost.'</td>
			<td colspan="1">'.$wineCostPercent.'</td>
			<td colspan="1">'.$even_wineCost.'</td>
			<td colspan="1">'.$even_wineCostPercent.'</td>
			<td colspan="1">'.$over1_wineCost.'</td>
			<td colspan="1">'.$over1_wineCostPercent.'</td>
			<td colspan="1">'.$over2_wineCost.'</td>
			<td colspan="1">'.$over2_wineCostPercent.'</td>
			<td colspan="1">'.$over3_wineCost.'</td>
			<td colspan="1">'.$over3_wineCostPercent.'</td>
			<td colspan="1">'.$over4_wineCost.'</td>
			<td colspan="1">'.$over4_wineCostPercent.'</td>
			<td colspan="1">'.$over5_wineCost.'</td>
			<td colspan="1">'.$over5_wineCostPercent.'</td>
			
		</tr>
		<tr>
			<td colspan="1">'.$liquorCostTitle.'</td>
			<td colspan="1">'.$liquorCost.'</td>
			<td colspan="1">'.$liquorCostPercent.'</td>
			<td colspan="1">'.$even_liquorCost.'</td>
			<td colspan="1">'.$even_liquorCostPercent.'</td>
			<td colspan="1">'.$over1_liquorCost.'</td>
			<td colspan="1">'.$over1_liquorCostPercent.'</td>
			<td colspan="1">'.$over2_liquorCost.'</td>
			<td colspan="1">'.$over2_liquorCostPercent.'</td>
			<td colspan="1">'.$over3_liquorCost.'</td>
			<td colspan="1">'.$over3_liquorCostPercent.'</td>
			<td colspan="1">'.$over4_liquorCost.'</td>
			<td colspan="1">'.$over4_liquorCostPercent.'</td>
			<td colspan="1">'.$over5_liquorCost.'</td>
			<td colspan="1">'.$over5_liquorCostPercent.'</td>
			
		</tr>	
		<tr>
			<td colspan="1">'.$deliveryCostTitle.'</td>
			<td colspan="1">'.$deliveryCost.'</td>
			<td colspan="1">'.$deliveryCostPercent.'</td>
			<td colspan="1">'.$even_deliveryCost.'</td>
			<td colspan="1">'.$even_deliveryCostPercent.'</td>
			<td colspan="1">'.$over1_deliveryCost.'</td>
			<td colspan="1">'.$over1_deliveryCostPercent.'</td>
			<td colspan="1">'.$over2_deliveryCost.'</td>
			<td colspan="1">'.$over2_deliveryCostPercent.'</td>
			<td colspan="1">'.$over3_deliveryCost.'</td>
			<td colspan="1">'.$over3_deliveryCostPercent.'</td>
			<td colspan="1">'.$over4_deliveryCost.'</td>
			<td colspan="1">'.$over4_deliveryCostPercent.'</td>
			<td colspan="1">'.$over5_deliveryCost.'</td>
			<td colspan="1">'.$over5_deliveryCostPercent.'</td>
			
		</tr>
		<tr>
			<td colspan="1">'.$cogsTotalTitle.'</td>
			<td colspan="1">'.$cogsTotal.'</td>
			<td colspan="1">'.$cogsTotalPercent.'</td>
			<td colspan="1">'.$even_cogsTotal.'</td>
			<td colspan="1">'.$even_cogsTotalPercent.'</td>
			<td colspan="1">'.$over1_cogsTotal.'</td>
			<td colspan="1">'.$over1_cogsTotalPercent.'</td>
			<td colspan="1">'.$over2_cogsTotal.'</td>
			<td colspan="1">'.$over2_cogsTotalPercent.'</td>
			<td colspan="1">'.$over3_cogsTotal.'</td>
			<td colspan="1">'.$over3_cogsTotalPercent.'</td>
			<td colspan="1">'.$over4_cogsTotal.'</td>
			<td colspan="1">'.$over4_cogsTotalPercent.'</td>
			<td colspan="1">'.$over5_cogsTotal.'</td>
			<td colspan="1">'.$over5_cogsTotalPercent.'</td>
			
		</tr>


		<tr>
			<th colspan="1">'.$laborTitle.'</th>
			<th colspan="14">'.$test.'</th>

		</tr>
		<tr>
			<td colspan="1">'.$generalManagerTitle.'</td>
			<td colspan="1">'.$generalManager.'</td>
			<td colspan="1">'.$generalManagerPercent.'</td>
			<td colspan="1">'.$even_generalManager.'</td>
			<td colspan="1">'.$even_generalManagerPercent.'</td>
			<td colspan="1">'.$over1_generalManager.'</td>
			<td colspan="1">'.$over1_generalManagerPercent.'</td>
			<td colspan="1">'.$over2_generalManager.'</td>
			<td colspan="1">'.$over2_generalManagerPercent.'</td>
			<td colspan="1">'.$over3_generalManager.'</td>
			<td colspan="1">'.$over3_generalManagerPercent.'</td>
			<td colspan="1">'.$over4_generalManager.'</td>
			<td colspan="1">'.$over4_generalManagerPercent.'</td>
			<td colspan="1">'.$over5_generalManager.'</td>
			<td colspan="1">'.$over5_generalManagerPercent.'</td>
			
		</tr>
		<tr>
			<td colspan="1">'.$kitchenManagerTitle.'</td>
			<td colspan="1">'.$kitchenManager.'</td>
			<td colspan="1">'.$kitchenManagerPercent.'</td>
			<td colspan="1">'.$even_kitchenManager.'</td>
			<td colspan="1">'.$even_kitchenManagerPercent.'</td>
			<td colspan="1">'.$over1_kitchenManager.'</td>
			<td colspan="1">'.$over1_kitchenManagerPercent.'</td>
			<td colspan="1">'.$over2_kitchenManager.'</td>
			<td colspan="1">'.$over2_kitchenManagerPercent.'</td>
			<td colspan="1">'.$over3_kitchenManager.'</td>
			<td colspan="1">'.$over3_kitchenManagerPercent.'</td>
			<td colspan="1">'.$over4_kitchenManager.'</td>
			<td colspan="1">'.$over4_kitchenManagerPercent.'</td>
			<td colspan="1">'.$over5_kitchenManager.'</td>
			<td colspan="1">'.$over5_kitchenManagerPercent.'</td>
			
		</tr>
		<tr>
			<td colspan="1">'.$asstManagerTitle.'</td>
			<td colspan="1">'.$asstManager.'</td>
			<td colspan="1">'.$asstManagerPercent.'</td>
			<td colspan="1">'.$even_asstManager.'</td>
			<td colspan="1">'.$even_asstManagerPercent.'</td>
			<td colspan="1">'.$over1_asstManager.'</td>
			<td colspan="1">'.$over1_asstManagerPercent.'</td>
			<td colspan="1">'.$over2_asstManager.'</td>
			<td colspan="1">'.$over2_asstManagerPercent.'</td>
			<td colspan="1">'.$over3_asstManager.'</td>
			<td colspan="1">'.$over3_asstManagerPercent.'</td>
			<td colspan="1">'.$over4_asstManager.'</td>
			<td colspan="1">'.$over4_asstManagerPercent.'</td>
			<td colspan="1">'.$over5_asstManager.'</td>
			<td colspan="1">'.$over5_asstManagerPercent.'</td>
			
		</tr>

		<tr>
			<td colspan="1">'.$wagesHourlyFOHTitle.'</td>
			<td colspan="1">'.$wagesHourlyFOH.'</td>
			<td colspan="1">'.$wagesHourlyFOHPercent.'</td>
			<td colspan="1">'.$even_wagesHourlyFOH.'</td>
			<td colspan="1">'.$even_wagesHourlyFOHPercent.'</td>
			<td colspan="1">'.$over1_wagesHourlyFOH.'</td>
			<td colspan="1">'.$over1_wagesHourlyFOHPercent.'</td>
			<td colspan="1">'.$over2_wagesHourlyFOH.'</td>
			<td colspan="1">'.$over2_wagesHourlyFOHPercent.'</td>
			<td colspan="1">'.$over3_wagesHourlyFOH.'</td>
			<td colspan="1">'.$over3_wagesHourlyFOHPercent.'</td>
			<td colspan="1">'.$over4_wagesHourlyFOH.'</td>
			<td colspan="1">'.$over4_wagesHourlyFOHPercent.'</td>
			<td colspan="1">'.$over5_wagesHourlyFOH.'</td>
			<td colspan="1">'.$over5_wagesHourlyFOHPercent.'</td>
			
		</tr>
		<tr>
			<td colspan="1">'.$wagesHourlyBOHTitle.'</td>
			<td colspan="1">'.$wagesHourlyBOH.'</td>
			<td colspan="1">'.$wagesHourlyBOHPercent.'</td>
			<td colspan="1">'.$even_wagesHourlyBOH.'</td>
			<td colspan="1">'.$even_wagesHourlyBOHPercent.'</td>
			<td colspan="1">'.$over1_wagesHourlyBOH.'</td>
			<td colspan="1">'.$over1_wagesHourlyBOHPercent.'</td>
			<td colspan="1">'.$over2_wagesHourlyBOH.'</td>
			<td colspan="1">'.$over2_wagesHourlyBOHPercent.'</td>
			<td colspan="1">'.$over3_wagesHourlyBOH.'</td>
			<td colspan="1">'.$over3_wagesHourlyBOHPercent.'</td>
			<td colspan="1">'.$over4_wagesHourlyBOH.'</td>
			<td colspan="1">'.$over4_wagesHourlyBOHPercent.'</td>
			<td colspan="1">'.$over5_wagesHourlyBOH.'</td>
			<td colspan="1">'.$over5_wagesHourlyBOHPercent.'</td>
			
		</tr>
		<tr>
			<td colspan="1">'.$wagesHourlyUtilityTitle.'</td>
			<td colspan="1">'.$wagesHourlyUtility.'</td>
			<td colspan="1">'.$wagesHourlyUtilityPercent.'</td>
			<td colspan="1">'.$even_wagesHourlyUtility.'</td>
			<td colspan="1">'.$even_wagesHourlyUtilityPercent.'</td>
			<td colspan="1">'.$over1_wagesHourlyUtility.'</td>
			<td colspan="1">'.$over1_wagesHourlyUtilityPercent.'</td>
			<td colspan="1">'.$over2_wagesHourlyUtility.'</td>
			<td colspan="1">'.$over2_wagesHourlyUtilityPercent.'</td>
			<td colspan="1">'.$over3_wagesHourlyUtility.'</td>
			<td colspan="1">'.$over3_wagesHourlyUtilityPercent.'</td>
			<td colspan="1">'.$over4_wagesHourlyUtility.'</td>
			<td colspan="1">'.$over4_wagesHourlyUtilityPercent.'</td>
			<td colspan="1">'.$over5_wagesHourlyUtility.'</td>
			<td colspan="1">'.$over5_wagesHourlyUtilityPercent.'</td>
			
		</tr>
		<tr>
			<td colspan="1">'.$wagesMiscTitle.'</td>
			<td colspan="1">'.$wagesMisc.'</td>
			<td colspan="1">'.$wagesMiscPercent.'</td>
			<td colspan="1">'.$even_wagesMisc.'</td>
			<td colspan="1">'.$even_wagesMiscPercent.'</td>
			<td colspan="1">'.$over1_wagesMisc.'</td>
			<td colspan="1">'.$over1_wagesMiscPercent.'</td>
			<td colspan="1">'.$over2_wagesMisc.'</td>
			<td colspan="1">'.$over2_wagesMiscPercent.'</td>
			<td colspan="1">'.$over3_wagesMisc.'</td>
			<td colspan="1">'.$over3_wagesMiscPercent.'</td>
			<td colspan="1">'.$over4_wagesMisc.'</td>
			<td colspan="1">'.$over4_wagesMiscPercent.'</td>
			<td colspan="1">'.$over5_wagesMisc.'</td>
			<td colspan="1">'.$over5_wagesMiscPercent.'</td>
			
		</tr>

		<tr>
			<td colspan="1">'.$totalDirectLaborTitle.'</td>
			<td colspan="1">'.$totalDirectLabor.'</td>
			<td colspan="1">'.$totalDirectLaborPercent.'</td>
			<td colspan="1">'.$even_totalDirectLabor.'</td>
			<td colspan="1">'.$even_totalDirectLaborPercent.'</td>
			<td colspan="1">'.$over1_totalDirectLabor.'</td>
			<td colspan="1">'.$over1_totalDirectLaborPercent.'</td>
			<td colspan="1">'.$over2_totalDirectLabor.'</td>
			<td colspan="1">'.$over2_totalDirectLaborPercent.'</td>
			<td colspan="1">'.$over3_totalDirectLabor.'</td>
			<td colspan="1">'.$over3_totalDirectLaborPercent.'</td>
			<td colspan="1">'.$over4_totalDirectLabor.'</td>
			<td colspan="1">'.$over4_totalDirectLaborPercent.'</td>
			<td colspan="1">'.$over5_totalDirectLabor.'</td>
			<td colspan="1">'.$over5_totalDirectLaborPercent.'</td>
			
		</tr>
		<tr>
			<td colspan="1">'.$bonusTitle.'</td>
			<td colspan="1">'.$bonus.'</td>
			<td colspan="1">'.$bonusPercent.'</td>
			<td colspan="1">'.$even_bonus.'</td>
			<td colspan="1">'.$even_bonusPercent.'</td>
			<td colspan="1">'.$over1_bonus.'</td>
			<td colspan="1">'.$over1_bonusPercent.'</td>
			<td colspan="1">'.$over2_bonus.'</td>
			<td colspan="1">'.$over2_bonusPercent.'</td>
			<td colspan="1">'.$over3_bonus.'</td>
			<td colspan="1">'.$over3_bonusPercent.'</td>
			<td colspan="1">'.$over4_bonus.'</td>
			<td colspan="1">'.$over4_bonusPercent.'</td>
			<td colspan="1">'.$over5_bonus.'</td>
			<td colspan="1">'.$over5_bonusPercent.'</td>
			
		</tr>

		<tr>
			<td colspan="1">'.$hTexpenseTitle.'</td>
			<td colspan="1">'.$hTexpense.'</td>
			<td colspan="1">'.$hTexpensePercent.'</td>
			<td colspan="1">'.$even_hTexpense.'</td>
			<td colspan="1">'.$even_hTexpensePercent.'</td>
			<td colspan="1">'.$over1_hTexpense.'</td>
			<td colspan="1">'.$over1_hTexpensePercent.'</td>
			<td colspan="1">'.$over2_hTexpense.'</td>
			<td colspan="1">'.$over2_hTexpensePercent.'</td>
			<td colspan="1">'.$over3_hTexpense.'</td>
			<td colspan="1">'.$over3_hTexpensePercent.'</td>
			<td colspan="1">'.$over4_hTexpense.'</td>
			<td colspan="1">'.$over4_hTexpensePercent.'</td>
			<td colspan="1">'.$over5_hTexpense.'</td>
			<td colspan="1">'.$over5_hTexpensePercent.'</td>
			
		</tr>

		<tr>
			<td colspan="1">'.$payrollTitle.'</td>
			<td colspan="1">'.$payroll.'</td>
			<td colspan="1">'.$payrollPercent.'</td>
			<td colspan="1">'.$even_payroll.'</td>
			<td colspan="1">'.$even_payrollPercent.'</td>
			<td colspan="1">'.$over1_payroll.'</td>
			<td colspan="1">'.$over1_payrollPercent.'</td>
			<td colspan="1">'.$over2_payroll.'</td>
			<td colspan="1">'.$over2_payrollPercent.'</td>
			<td colspan="1">'.$over3_payroll.'</td>
			<td colspan="1">'.$over3_payrollPercent.'</td>
			<td colspan="1">'.$over4_payroll.'</td>
			<td colspan="1">'.$over4_payrollPercent.'</td>
			<td colspan="1">'.$over5_payroll.'</td>
			<td colspan="1">'.$over5_payrollPercent.'</td>
			
		</tr>
		<tr>
			<td colspan="1">'.$benefitsTitle.'</td>
			<td colspan="1">'.$benefits.'</td>
			<td colspan="1">'.$benefitsPercent.'</td>
			<td colspan="1">'.$even_benefits.'</td>
			<td colspan="1">'.$even_benefitsPercent.'</td>
			<td colspan="1">'.$over1_benefits.'</td>
			<td colspan="1">'.$over1_benefitsPercent.'</td>
			<td colspan="1">'.$over2_benefits.'</td>
			<td colspan="1">'.$over2_benefitsPercent.'</td>
			<td colspan="1">'.$over3_benefits.'</td>
			<td colspan="1">'.$over3_benefitsPercent.'</td>
			<td colspan="1">'.$over4_benefits.'</td>
			<td colspan="1">'.$over4_benefitsPercent.'</td>
			<td colspan="1">'.$over5_benefits.'</td>
			<td colspan="1">'.$over5_benefitsPercent.'</td>
			
		</tr>
		<tr>
			<td colspan="1">'.$laborTotalTitle.'</td>
			<td colspan="1">'.$laborTotal.'</td>
			<td colspan="1">'.$laborTotalPercent.'</td>
			<td colspan="1">'.$even_laborTotal.'</td>
			<td colspan="1">'.$even_laborTotalPercent.'</td>
			<td colspan="1">'.$over1_laborTotal.'</td>
			<td colspan="1">'.$over1_laborTotalPercent.'</td>
			<td colspan="1">'.$over2_laborTotal.'</td>
			<td colspan="1">'.$over2_laborTotalPercent.'</td>
			<td colspan="1">'.$over3_laborTotal.'</td>
			<td colspan="1">'.$over3_laborTotalPercent.'</td>
			<td colspan="1">'.$over4_laborTotal.'</td>
			<td colspan="1">'.$over4_laborTotalPercent.'</td>
			<td colspan="1">'.$over5_laborTotal.'</td>
			<td colspan="1">'.$over5_laborTotalPercent.'</td>
			
		</tr>

		<tr>
			<td colspan="1">'.$bigTwoTitle.'</td>
			<td colspan="1">'.$bigTwo.'</td>
			<td colspan="1">'.$bigTwoPercent.'</td>
			<td colspan="1">'.$even_bigTwo.'</td>
			<td colspan="1">'.$even_bigTwoPercent.'</td>
			<td colspan="1">'.$over1_bigTwo.'</td>
			<td colspan="1">'.$over1_bigTwoPercent.'</td>
			<td colspan="1">'.$over2_bigTwo.'</td>
			<td colspan="1">'.$over2_bigTwoPercent.'</td>
			<td colspan="1">'.$over3_bigTwo.'</td>
			<td colspan="1">'.$over3_bigTwoPercent.'</td>
			<td colspan="1">'.$over4_bigTwo.'</td>
			<td colspan="1">'.$over4_bigTwoPercent.'</td>
			<td colspan="1">'.$over5_bigTwo.'</td>
			<td colspan="1">'.$over5_bigTwoPercent.'</td>
			
		</tr>

		<tr>
			<th colspan="1">'.$opExpenseTitle.'</th>
			<th colspan="14">'.$test.'</th>

		</tr>


		<tr>
			<td colspan="1">'.$bigTwoTitle.'</td>
			<td colspan="1">'.$bigTwo.'</td>
			<td colspan="1">'.$bigTwoPercent.'</td>
			<td colspan="1">'.$even_bigTwo.'</td>
			<td colspan="1">'.$even_bigTwoPercent.'</td>
			<td colspan="1">'.$over1_bigTwo.'</td>
			<td colspan="1">'.$over1_bigTwoPercent.'</td>
			<td colspan="1">'.$over2_bigTwo.'</td>
			<td colspan="1">'.$over2_bigTwoPercent.'</td>
			<td colspan="1">'.$over3_bigTwo.'</td>
			<td colspan="1">'.$over3_bigTwoPercent.'</td>
			<td colspan="1">'.$over4_bigTwo.'</td>
			<td colspan="1">'.$over4_bigTwoPercent.'</td>
			<td colspan="1">'.$over5_bigTwo.'</td>
			<td colspan="1">'.$over5_bigTwoPercent.'</td>
			
		</tr>

		<tr>
			<td colspan="1">'.$bankServiceChargeTitle.'</td>
			<td colspan="1">'.$bankServiceCharge.'</td>
			<td colspan="1">'.$bankServiceChargePercent.'</td>
			<td colspan="1">'.$even_bankServiceCharge.'</td>
			<td colspan="1">'.$even_bankServiceChargePercent.'</td>
			<td colspan="1">'.$over1_bankServiceCharge.'</td>
			<td colspan="1">'.$over1_bankServiceChargePercent.'</td>
			<td colspan="1">'.$over2_bankServiceCharge.'</td>
			<td colspan="1">'.$over2_bankServiceChargePercent.'</td>
			<td colspan="1">'.$over3_bankServiceCharge.'</td>
			<td colspan="1">'.$over3_bankServiceChargePercent.'</td>
			<td colspan="1">'.$over4_bankServiceCharge.'</td>
			<td colspan="1">'.$over4_bankServiceChargePercent.'</td>
			<td colspan="1">'.$over5_bankServiceCharge.'</td>
			<td colspan="1">'.$over5_bankServiceChargePercent.'</td>
			
		</tr>

		<tr>
			<td colspan="1">'.$outsideServicesTitle.'</td>
			<td colspan="1">'.$outsideServices.'</td>
			<td colspan="1">'.$outsideServicesPercent.'</td>
			<td colspan="1">'.$even_outsideServices.'</td>
			<td colspan="1">'.$even_outsideServicesPercent.'</td>
			<td colspan="1">'.$over1_outsideServices.'</td>
			<td colspan="1">'.$over1_outsideServicesPercent.'</td>
			<td colspan="1">'.$over2_outsideServices.'</td>
			<td colspan="1">'.$over2_outsideServicesPercent.'</td>
			<td colspan="1">'.$over3_outsideServices.'</td>
			<td colspan="1">'.$over3_outsideServicesPercent.'</td>
			<td colspan="1">'.$over4_outsideServices.'</td>
			<td colspan="1">'.$over4_outsideServicesPercent.'</td>
			<td colspan="1">'.$over5_outsideServices.'</td>
			<td colspan="1">'.$over5_outsideServicesPercent.'</td>
			
		</tr>
		<tr>
			<td colspan="1">'.$repairMainTitle.'</td>
			<td colspan="1">'.$repairMain.'</td>
			<td colspan="1">'.$repairMainPercent.'</td>
			<td colspan="1">'.$even_repairMain.'</td>
			<td colspan="1">'.$even_repairMainPercent.'</td>
			<td colspan="1">'.$over1_repairMain.'</td>
			<td colspan="1">'.$over1_repairMainPercent.'</td>
			<td colspan="1">'.$over2_repairMain.'</td>
			<td colspan="1">'.$over2_repairMainPercent.'</td>
			<td colspan="1">'.$over3_repairMain.'</td>
			<td colspan="1">'.$over3_repairMainPercent.'</td>
			<td colspan="1">'.$over4_repairMain.'</td>
			<td colspan="1">'.$over4_repairMainPercent.'</td>
			<td colspan="1">'.$over5_repairMain.'</td>
			<td colspan="1">'.$over5_repairMainPercent.'</td>
			
		</tr>

		<tr>
			<td colspan="1">'.$overShortTitle.'</td>
			<td colspan="1">'.$overShort.'</td>
			<td colspan="1">'.$overShortPercent.'</td>
			<td colspan="1">'.$even_overShort.'</td>
			<td colspan="1">'.$even_overShortPercent.'</td>
			<td colspan="1">'.$over1_overShort.'</td>
			<td colspan="1">'.$over1_overShortPercent.'</td>
			<td colspan="1">'.$over2_overShort.'</td>
			<td colspan="1">'.$over2_overShortPercent.'</td>
			<td colspan="1">'.$over3_overShort.'</td>
			<td colspan="1">'.$over3_overShortPercent.'</td>
			<td colspan="1">'.$over4_overShort.'</td>
			<td colspan="1">'.$over4_overShortPercent.'</td>
			<td colspan="1">'.$over5_overShort.'</td>
			<td colspan="1">'.$over5_overShortPercent.'</td>
			
		</tr>

		<tr>
			<td colspan="1">'.$suppliesOperationTitle.'</td>
			<td colspan="1">'.$suppliesOperation.'</td>
			<td colspan="1">'.$suppliesOperationPercent.'</td>
			<td colspan="1">'.$even_suppliesOperation.'</td>
			<td colspan="1">'.$even_suppliesOperationPercent.'</td>
			<td colspan="1">'.$over1_suppliesOperation.'</td>
			<td colspan="1">'.$over1_suppliesOperationPercent.'</td>
			<td colspan="1">'.$over2_suppliesOperation.'</td>
			<td colspan="1">'.$over2_suppliesOperationPercent.'</td>
			<td colspan="1">'.$over3_suppliesOperation.'</td>
			<td colspan="1">'.$over3_suppliesOperationPercent.'</td>
			<td colspan="1">'.$over4_suppliesOperation.'</td>
			<td colspan="1">'.$over4_suppliesOperationPercent.'</td>
			<td colspan="1">'.$over5_suppliesOperation.'</td>
			<td colspan="1">'.$over5_suppliesOperationPercent.'</td>
			
		</tr>

		<tr>
			<td colspan="1">'.$suppliesOfficeTitle.'</td>
			<td colspan="1">'.$suppliesOffice.'</td>
			<td colspan="1">'.$suppliesOfficePercent.'</td>
			<td colspan="1">'.$even_suppliesOffice.'</td>
			<td colspan="1">'.$even_suppliesOfficePercent.'</td>
			<td colspan="1">'.$over1_suppliesOffice.'</td>
			<td colspan="1">'.$over1_suppliesOfficePercent.'</td>
			<td colspan="1">'.$over2_suppliesOffice.'</td>
			<td colspan="1">'.$over2_suppliesOfficePercent.'</td>
			<td colspan="1">'.$over3_suppliesOffice.'</td>
			<td colspan="1">'.$over3_suppliesOfficePercent.'</td>
			<td colspan="1">'.$over4_suppliesOffice.'</td>
			<td colspan="1">'.$over4_suppliesOfficePercent.'</td>
			<td colspan="1">'.$over5_suppliesOffice.'</td>
			<td colspan="1">'.$over5_suppliesOfficePercent.'</td>
			
		</tr>



		<tr>
			<td colspan="1">'.$suppliesPostageTitle.'</td>
			<td colspan="1">'.$suppliesPostage.'</td>
			<td colspan="1">'.$suppliesPostagePercent.'</td>
			<td colspan="1">'.$even_suppliesPostage.'</td>
			<td colspan="1">'.$even_suppliesPostagePercent.'</td>
			<td colspan="1">'.$over1_suppliesPostage.'</td>
			<td colspan="1">'.$over1_suppliesPostagePercent.'</td>
			<td colspan="1">'.$over2_suppliesPostage.'</td>
			<td colspan="1">'.$over2_suppliesPostagePercent.'</td>
			<td colspan="1">'.$over3_suppliesPostage.'</td>
			<td colspan="1">'.$over3_suppliesPostagePercent.'</td>
			<td colspan="1">'.$over4_suppliesPostage.'</td>
			<td colspan="1">'.$over4_suppliesPostagePercent.'</td>
			<td colspan="1">'.$over5_suppliesPostage.'</td>
			<td colspan="1">'.$over5_suppliesPostagePercent.'</td>
			
		</tr>


		<tr>
			<td colspan="1">'.$suppliesSmallwaresTitle.'</td>
			<td colspan="1">'.$suppliesSmallwares.'</td>
			<td colspan="1">'.$suppliesSmallwaresPercent.'</td>
			<td colspan="1">'.$even_suppliesSmallwares.'</td>
			<td colspan="1">'.$even_suppliesSmallwaresPercent.'</td>
			<td colspan="1">'.$over1_suppliesSmallwares.'</td>
			<td colspan="1">'.$over1_suppliesSmallwaresPercent.'</td>
			<td colspan="1">'.$over2_suppliesSmallwares.'</td>
			<td colspan="1">'.$over2_suppliesSmallwaresPercent.'</td>
			<td colspan="1">'.$over3_suppliesSmallwares.'</td>
			<td colspan="1">'.$over3_suppliesSmallwaresPercent.'</td>
			<td colspan="1">'.$over4_suppliesSmallwares.'</td>
			<td colspan="1">'.$over4_suppliesSmallwaresPercent.'</td>
			<td colspan="1">'.$over5_suppliesSmallwares.'</td>
			<td colspan="1">'.$over5_suppliesSmallwaresPercent.'</td>
			
		</tr>
		<tr>
			<td colspan="1">'.$linenTitle.'</td>
			<td colspan="1">'.$linen.'</td>
			<td colspan="1">'.$linenPercent.'</td>
			<td colspan="1">'.$even_linen.'</td>
			<td colspan="1">'.$even_linenPercent.'</td>
			<td colspan="1">'.$over1_linen.'</td>
			<td colspan="1">'.$over1_linenPercent.'</td>
			<td colspan="1">'.$over2_linen.'</td>
			<td colspan="1">'.$over2_linenPercent.'</td>
			<td colspan="1">'.$over3_linen.'</td>
			<td colspan="1">'.$over3_linenPercent.'</td>
			<td colspan="1">'.$over4_linen.'</td>
			<td colspan="1">'.$over4_linenPercent.'</td>
			<td colspan="1">'.$over5_linen.'</td>
			<td colspan="1">'.$over5_linenPercent.'</td>
			
		</tr>
		<tr>
			<td colspan="1">'.$pestTitle.'</td>
			<td colspan="1">'.$pest.'</td>
			<td colspan="1">'.$pestPercent.'</td>
			<td colspan="1">'.$even_pest.'</td>
			<td colspan="1">'.$even_pestPercent.'</td>
			<td colspan="1">'.$over1_pest.'</td>
			<td colspan="1">'.$over1_pestPercent.'</td>
			<td colspan="1">'.$over2_pest.'</td>
			<td colspan="1">'.$over2_pestPercent.'</td>
			<td colspan="1">'.$over3_pest.'</td>
			<td colspan="1">'.$over3_pestPercent.'</td>
			<td colspan="1">'.$over4_pest.'</td>
			<td colspan="1">'.$over4_pestPercent.'</td>
			<td colspan="1">'.$over5_pest.'</td>
			<td colspan="1">'.$over5_pestPercent.'</td>
			
		</tr>
		<tr>
			<td colspan="1">'.$deliveryTitle.'</td>
			<td colspan="1">'.$delivery.'</td>
			<td colspan="1">'.$deliveryPercent.'</td>
			<td colspan="1">'.$even_delivery.'</td>
			<td colspan="1">'.$even_deliveryPercent.'</td>
			<td colspan="1">'.$over1_delivery.'</td>
			<td colspan="1">'.$over1_deliveryPercent.'</td>
			<td colspan="1">'.$over2_delivery.'</td>
			<td colspan="1">'.$over2_deliveryPercent.'</td>
			<td colspan="1">'.$over3_delivery.'</td>
			<td colspan="1">'.$over3_deliveryPercent.'</td>
			<td colspan="1">'.$over4_delivery.'</td>
			<td colspan="1">'.$over4_deliveryPercent.'</td>
			<td colspan="1">'.$over5_delivery.'</td>
			<td colspan="1">'.$over5_deliveryPercent.'</td>
			
		</tr>
		<tr>
			<td colspan="1">'.$telephoneTitle.'</td>
			<td colspan="1">'.$telephone.'</td>
			<td colspan="1">'.$telephonePercent.'</td>
			<td colspan="1">'.$even_telephone.'</td>
			<td colspan="1">'.$even_telephonePercent.'</td>
			<td colspan="1">'.$over1_telephone.'</td>
			<td colspan="1">'.$over1_telephonePercent.'</td>
			<td colspan="1">'.$over2_telephone.'</td>
			<td colspan="1">'.$over2_telephonePercent.'</td>
			<td colspan="1">'.$over3_telephone.'</td>
			<td colspan="1">'.$over3_telephonePercent.'</td>
			<td colspan="1">'.$over4_telephone.'</td>
			<td colspan="1">'.$over4_telephonePercent.'</td>
			<td colspan="1">'.$over5_telephone.'</td>
			<td colspan="1">'.$over5_telephonePercent.'</td>
			
		</tr>
		<tr>
			<td colspan="1">'.$internetTitle.'</td>
			<td colspan="1">'.$internet.'</td>
			<td colspan="1">'.$internetPercent.'</td>
			<td colspan="1">'.$even_internet.'</td>
			<td colspan="1">'.$even_internetPercent.'</td>
			<td colspan="1">'.$over1_internet.'</td>
			<td colspan="1">'.$over1_internetPercent.'</td>
			<td colspan="1">'.$over2_internet.'</td>
			<td colspan="1">'.$over2_internetPercent.'</td>
			<td colspan="1">'.$over3_internet.'</td>
			<td colspan="1">'.$over3_internetPercent.'</td>
			<td colspan="1">'.$over4_internet.'</td>
			<td colspan="1">'.$over4_internetPercent.'</td>
			<td colspan="1">'.$over5_internet.'</td>
			<td colspan="1">'.$over5_internetPercent.'</td>
			
		</tr>
		<tr>
			<td colspan="1">'.$utilitesElectricTitle.'</td>
			<td colspan="1">'.$utilitesElectric.'</td>
			<td colspan="1">'.$utilitesElectricPercent.'</td>
			<td colspan="1">'.$even_utilitesElectric.'</td>
			<td colspan="1">'.$even_utilitesElectricPercent.'</td>
			<td colspan="1">'.$over1_utilitesElectric.'</td>
			<td colspan="1">'.$over1_utilitesElectricPercent.'</td>
			<td colspan="1">'.$over2_utilitesElectric.'</td>
			<td colspan="1">'.$over2_utilitesElectricPercent.'</td>
			<td colspan="1">'.$over3_utilitesElectric.'</td>
			<td colspan="1">'.$over3_utilitesElectricPercent.'</td>
			<td colspan="1">'.$over4_utilitesElectric.'</td>
			<td colspan="1">'.$over4_utilitesElectricPercent.'</td>
			<td colspan="1">'.$over5_utilitesElectric.'</td>
			<td colspan="1">'.$over5_utilitesElectricPercent.'</td>
			
		</tr>
		<tr>
			<td colspan="1">'.$utilitesGasTitle.'</td>
			<td colspan="1">'.$utilitesGas.'</td>
			<td colspan="1">'.$utilitesGasPercent.'</td>
			<td colspan="1">'.$even_utilitesGas.'</td>
			<td colspan="1">'.$even_utilitesGasPercent.'</td>
			<td colspan="1">'.$over1_utilitesGas.'</td>
			<td colspan="1">'.$over1_utilitesGasPercent.'</td>
			<td colspan="1">'.$over2_utilitesGas.'</td>
			<td colspan="1">'.$over2_utilitesGasPercent.'</td>
			<td colspan="1">'.$over3_utilitesGas.'</td>
			<td colspan="1">'.$over3_utilitesGasPercent.'</td>
			<td colspan="1">'.$over4_utilitesGas.'</td>
			<td colspan="1">'.$over4_utilitesGasPercent.'</td>
			<td colspan="1">'.$over5_utilitesGas.'</td>
			<td colspan="1">'.$over5_utilitesGasPercent.'</td>
			
		</tr>
		<tr>
			<td colspan="1">'.$utilitesWaterTitle.'</td>
			<td colspan="1">'.$utilitesWater.'</td>
			<td colspan="1">'.$utilitesWaterPercent.'</td>
			<td colspan="1">'.$even_utilitesWater.'</td>
			<td colspan="1">'.$even_utilitesWaterPercent.'</td>
			<td colspan="1">'.$over1_utilitesWater.'</td>
			<td colspan="1">'.$over1_utilitesWaterPercent.'</td>
			<td colspan="1">'.$over2_utilitesWater.'</td>
			<td colspan="1">'.$over2_utilitesWaterPercent.'</td>
			<td colspan="1">'.$over3_utilitesWater.'</td>
			<td colspan="1">'.$over3_utilitesWaterPercent.'</td>
			<td colspan="1">'.$over4_utilitesWater.'</td>
			<td colspan="1">'.$over4_utilitesWaterPercent.'</td>
			<td colspan="1">'.$over5_utilitesWater.'</td>
			<td colspan="1">'.$over5_utilitesWaterPercent.'</td>
			
		</tr>
		<tr>
			<td colspan="1">'.$cableTitle.'</td>
			<td colspan="1">'.$cable.'</td>
			<td colspan="1">'.$cablePercent.'</td>
			<td colspan="1">'.$even_cable.'</td>
			<td colspan="1">'.$even_cablePercent.'</td>
			<td colspan="1">'.$over1_cable.'</td>
			<td colspan="1">'.$over1_cablePercent.'</td>
			<td colspan="1">'.$over2_cable.'</td>
			<td colspan="1">'.$over2_cablePercent.'</td>
			<td colspan="1">'.$over3_cable.'</td>
			<td colspan="1">'.$over3_cablePercent.'</td>
			<td colspan="1">'.$over4_cable.'</td>
			<td colspan="1">'.$over4_cablePercent.'</td>
			<td colspan="1">'.$over5_cable.'</td>
			<td colspan="1">'.$over5_cablePercent.'</td>
			
		</tr>

		<tr>
			<td colspan="1">'.$securityTitle.'</td>
			<td colspan="1">'.$security.'</td>
			<td colspan="1">'.$securityPercent.'</td>
			<td colspan="1">'.$even_security.'</td>
			<td colspan="1">'.$even_securityPercent.'</td>
			<td colspan="1">'.$over1_security.'</td>
			<td colspan="1">'.$over1_securityPercent.'</td>
			<td colspan="1">'.$over2_security.'</td>
			<td colspan="1">'.$over2_securityPercent.'</td>
			<td colspan="1">'.$over3_security.'</td>
			<td colspan="1">'.$over3_securityPercent.'</td>
			<td colspan="1">'.$over4_security.'</td>
			<td colspan="1">'.$over4_securityPercent.'</td>
			<td colspan="1">'.$over5_security.'</td>
			<td colspan="1">'.$over5_securityPercent.'</td>
			
		</tr>

		<tr>
			<td colspan="1">'.$entKarTitle.'</td>
			<td colspan="1">'.$entKar.'</td>
			<td colspan="1">'.$entKarPercent.'</td>
			<td colspan="1">'.$even_entKar.'</td>
			<td colspan="1">'.$even_entKarPercent.'</td>
			<td colspan="1">'.$over1_entKar.'</td>
			<td colspan="1">'.$over1_entKarPercent.'</td>
			<td colspan="1">'.$over2_entKar.'</td>
			<td colspan="1">'.$over2_entKarPercent.'</td>
			<td colspan="1">'.$over3_entKar.'</td>
			<td colspan="1">'.$over3_entKarPercent.'</td>
			<td colspan="1">'.$over4_entKar.'</td>
			<td colspan="1">'.$over4_entKarPercent.'</td>
			<td colspan="1">'.$over5_entKar.'</td>
			<td colspan="1">'.$over5_entKarPercent.'</td>
			
		</tr>
		<tr>
			<td colspan="1">'.$miscUnknownTitle.'</td>
			<td colspan="1">'.$miscUnknown.'</td>
			<td colspan="1">'.$miscUnknownPercent.'</td>
			<td colspan="1">'.$even_miscUnknown.'</td>
			<td colspan="1">'.$even_miscUnknownPercent.'</td>
			<td colspan="1">'.$over1_miscUnknown.'</td>
			<td colspan="1">'.$over1_miscUnknownPercent.'</td>
			<td colspan="1">'.$over2_miscUnknown.'</td>
			<td colspan="1">'.$over2_miscUnknownPercent.'</td>
			<td colspan="1">'.$over3_miscUnknown.'</td>
			<td colspan="1">'.$over3_miscUnknownPercent.'</td>
			<td colspan="1">'.$over4_miscUnknown.'</td>
			<td colspan="1">'.$over4_miscUnknownPercent.'</td>
			<td colspan="1">'.$over5_miscUnknown.'</td>
			<td colspan="1">'.$over5_miscUnknownPercent.'</td>
			
		</tr>


		<tr>
			<td colspan="1">'.$totalOperatingExpenseTitle.'</td>
			<td colspan="1">'.$totalOperatingExpense.'</td>
			<td colspan="1">'.$totalOperatingExpensePercent.'</td>
			<td colspan="1">'.$even_totalOperatingExpense.'</td>
			<td colspan="1">'.$even_totalOperatingExpensePercent.'</td>
			<td colspan="1">'.$over1_totalOperatingExpense.'</td>
			<td colspan="1">'.$over1_totalOperatingExpensePercent.'</td>
			<td colspan="1">'.$over2_totalOperatingExpense.'</td>
			<td colspan="1">'.$over2_totalOperatingExpensePercent.'</td>
			<td colspan="1">'.$over3_totalOperatingExpense.'</td>
			<td colspan="1">'.$over3_totalOperatingExpensePercent.'</td>
			<td colspan="1">'.$over4_totalOperatingExpense.'</td>
			<td colspan="1">'.$over4_totalOperatingExpensePercent.'</td>
			<td colspan="1">'.$over5_totalOperatingExpense.'</td>
			<td colspan="1">'.$over5_totalOperatingExpensePercent.'</td>
			
		</tr>

		<tr>
			<th colspan="1">'.$othExpenseTitle.'</th>
			<th colspan="14">'.$test.'</th>

		</tr>


		<tr>
			<td colspan="1">'.$accountTitle.'</td>
			<td colspan="1">'.$account.'</td>
			<td colspan="1">'.$accountPercent.'</td>
			<td colspan="1">'.$even_account.'</td>
			<td colspan="1">'.$even_accountPercent.'</td>
			<td colspan="1">'.$over1_account.'</td>
			<td colspan="1">'.$over1_accountPercent.'</td>
			<td colspan="1">'.$over2_account.'</td>
			<td colspan="1">'.$over2_accountPercent.'</td>
			<td colspan="1">'.$over3_account.'</td>
			<td colspan="1">'.$over3_accountPercent.'</td>
			<td colspan="1">'.$over4_account.'</td>
			<td colspan="1">'.$over4_accountPercent.'</td>
			<td colspan="1">'.$over5_account.'</td>
			<td colspan="1">'.$over5_accountPercent.'</td>
			
		</tr>
		<tr>
			<td colspan="1">'.$legalTitle.'</td>
			<td colspan="1">'.$legal.'</td>
			<td colspan="1">'.$legalPercent.'</td>
			<td colspan="1">'.$even_legal.'</td>
			<td colspan="1">'.$even_legalPercent.'</td>
			<td colspan="1">'.$over1_legal.'</td>
			<td colspan="1">'.$over1_legalPercent.'</td>
			<td colspan="1">'.$over2_legal.'</td>
			<td colspan="1">'.$over2_legalPercent.'</td>
			<td colspan="1">'.$over3_legal.'</td>
			<td colspan="1">'.$over3_legalPercent.'</td>
			<td colspan="1">'.$over4_legal.'</td>
			<td colspan="1">'.$over4_legalPercent.'</td>
			<td colspan="1">'.$over5_legal.'</td>
			<td colspan="1">'.$over5_legalPercent.'</td>
			
		</tr>

		<tr>
			<td colspan="1">'.$mortRentTitle.'</td>
			<td colspan="1">'.$mortRent.'</td>
			<td colspan="1">'.$mortRentPercent.'</td>
			<td colspan="1">'.$even_mortRent.'</td>
			<td colspan="1">'.$even_mortRentPercent.'</td>
			<td colspan="1">'.$over1_mortRent.'</td>
			<td colspan="1">'.$over1_mortRentPercent.'</td>
			<td colspan="1">'.$over2_mortRent.'</td>
			<td colspan="1">'.$over2_mortRentPercent.'</td>
			<td colspan="1">'.$over3_mortRent.'</td>
			<td colspan="1">'.$over3_mortRentPercent.'</td>
			<td colspan="1">'.$over4_mortRent.'</td>
			<td colspan="1">'.$over4_mortRentPercent.'</td>
			<td colspan="1">'.$over5_mortRent.'</td>
			<td colspan="1">'.$over5_mortRentPercent.'</td>
			
		</tr>


		<tr>
			<td colspan="1">'.$tripleNTitle.'</td>
			<td colspan="1">'.$tripleN.'</td>
			<td colspan="1">'.$tripleNPercent.'</td>
			<td colspan="1">'.$even_tripleN.'</td>
			<td colspan="1">'.$even_tripleNPercent.'</td>
			<td colspan="1">'.$over1_tripleN.'</td>
			<td colspan="1">'.$over1_tripleNPercent.'</td>
			<td colspan="1">'.$over2_tripleN.'</td>
			<td colspan="1">'.$over2_tripleNPercent.'</td>
			<td colspan="1">'.$over3_tripleN.'</td>
			<td colspan="1">'.$over3_tripleNPercent.'</td>
			<td colspan="1">'.$over4_tripleN.'</td>
			<td colspan="1">'.$over4_tripleNPercent.'</td>
			<td colspan="1">'.$over5_tripleN.'</td>
			<td colspan="1">'.$over5_tripleNPercent.'</td>
			
		</tr>


		<tr>
			<td colspan="1">'.$invLoanPayTitle.'</td>
			<td colspan="1">'.$invLoanPay.'</td>
			<td colspan="1">'.$invLoanPayPercent.'</td>
			<td colspan="1">'.$even_invLoanPay.'</td>
			<td colspan="1">'.$even_invLoanPayPercent.'</td>
			<td colspan="1">'.$over1_invLoanPay.'</td>
			<td colspan="1">'.$over1_invLoanPayPercent.'</td>
			<td colspan="1">'.$over2_invLoanPay.'</td>
			<td colspan="1">'.$over2_invLoanPayPercent.'</td>
			<td colspan="1">'.$over3_invLoanPay.'</td>
			<td colspan="1">'.$over3_invLoanPayPercent.'</td>
			<td colspan="1">'.$over4_invLoanPay.'</td>
			<td colspan="1">'.$over4_invLoanPayPercent.'</td>
			<td colspan="1">'.$over5_invLoanPay.'</td>
			<td colspan="1">'.$over5_invLoanPayPercent.'</td>
			
		</tr>


		<tr>
			<td colspan="1">'.$insuranceTitle.'</td>
			<td colspan="1">'.$insurance.'</td>
			<td colspan="1">'.$insurancePercent.'</td>
			<td colspan="1">'.$even_insurance.'</td>
			<td colspan="1">'.$even_insurancePercent.'</td>
			<td colspan="1">'.$over1_insurance.'</td>
			<td colspan="1">'.$over1_insurancePercent.'</td>
			<td colspan="1">'.$over2_insurance.'</td>
			<td colspan="1">'.$over2_insurancePercent.'</td>
			<td colspan="1">'.$over3_insurance.'</td>
			<td colspan="1">'.$over3_insurancePercent.'</td>
			<td colspan="1">'.$over4_insurance.'</td>
			<td colspan="1">'.$over4_insurancePercent.'</td>
			<td colspan="1">'.$over5_insurance.'</td>
			<td colspan="1">'.$over5_insurancePercent.'</td>
			
		</tr>

		<tr>
			<td colspan="1">'.$licensePermitsTitle.'</td>
			<td colspan="1">'.$licensePermits.'</td>
			<td colspan="1">'.$licensePermitsPercent.'</td>
			<td colspan="1">'.$even_licensePermits.'</td>
			<td colspan="1">'.$even_licensePermitsPercent.'</td>
			<td colspan="1">'.$over1_licensePermits.'</td>
			<td colspan="1">'.$over1_licensePermitsPercent.'</td>
			<td colspan="1">'.$over2_licensePermits.'</td>
			<td colspan="1">'.$over2_licensePermitsPercent.'</td>
			<td colspan="1">'.$over3_licensePermits.'</td>
			<td colspan="1">'.$over3_licensePermitsPercent.'</td>
			<td colspan="1">'.$over4_licensePermits.'</td>
			<td colspan="1">'.$over4_licensePermitsPercent.'</td>
			<td colspan="1">'.$over5_licensePermits.'</td>
			<td colspan="1">'.$over5_licensePermitsPercent.'</td>
			
		</tr>

		<tr>
			<td colspan="1">'.$bOtaxesTitle.'</td>
			<td colspan="1">'.$bOtaxes.'</td>
			<td colspan="1">'.$bOtaxesPercent.'</td>
			<td colspan="1">'.$even_bOtaxes.'</td>
			<td colspan="1">'.$even_bOtaxesPercent.'</td>
			<td colspan="1">'.$over1_bOtaxes.'</td>
			<td colspan="1">'.$over1_bOtaxesPercent.'</td>
			<td colspan="1">'.$over2_bOtaxes.'</td>
			<td colspan="1">'.$over2_bOtaxesPercent.'</td>
			<td colspan="1">'.$over3_bOtaxes.'</td>
			<td colspan="1">'.$over3_bOtaxesPercent.'</td>
			<td colspan="1">'.$over4_bOtaxes.'</td>
			<td colspan="1">'.$over4_bOtaxesPercent.'</td>
			<td colspan="1">'.$over5_bOtaxes.'</td>
			<td colspan="1">'.$over5_bOtaxesPercent.'</td>
			
		</tr>


		<tr>
			<td colspan="1">'.$creditCardFeesTitle.'</td>
			<td colspan="1">'.$creditCardFees.'</td>
			<td colspan="1">'.$creditCardFeesPercent.'</td>
			<td colspan="1">'.$even_creditCardFees.'</td>
			<td colspan="1">'.$even_creditCardFeesPercent.'</td>
			<td colspan="1">'.$over1_creditCardFees.'</td>
			<td colspan="1">'.$over1_creditCardFeesPercent.'</td>
			<td colspan="1">'.$over2_creditCardFees.'</td>
			<td colspan="1">'.$over2_creditCardFeesPercent.'</td>
			<td colspan="1">'.$over3_creditCardFees.'</td>
			<td colspan="1">'.$over3_creditCardFeesPercent.'</td>
			<td colspan="1">'.$over4_creditCardFees.'</td>
			<td colspan="1">'.$over4_creditCardFeesPercent.'</td>
			<td colspan="1">'.$over5_creditCardFees.'</td>
			<td colspan="1">'.$over5_creditCardFeesPercent.'</td>
			
		</tr>


		<tr>
			<td colspan="1">'.$royaltiesTitle.'</td>
			<td colspan="1">'.$royalties.'</td>
			<td colspan="1">'.$royaltiesPercent.'</td>
			<td colspan="1">'.$even_royalties.'</td>
			<td colspan="1">'.$even_royaltiesPercent.'</td>
			<td colspan="1">'.$over1_royalties.'</td>
			<td colspan="1">'.$over1_royaltiesPercent.'</td>
			<td colspan="1">'.$over2_royalties.'</td>
			<td colspan="1">'.$over2_royaltiesPercent.'</td>
			<td colspan="1">'.$over3_royalties.'</td>
			<td colspan="1">'.$over3_royaltiesPercent.'</td>
			<td colspan="1">'.$over4_royalties.'</td>
			<td colspan="1">'.$over4_royaltiesPercent.'</td>
			<td colspan="1">'.$over5_royalties.'</td>
			<td colspan="1">'.$over5_royaltiesPercent.'</td>
			
		</tr>

		<tr>
			<td colspan="1">'.$totalOtherExpenseTitle.'</td>
			<td colspan="1">'.$totalOtherExpense.'</td>
			<td colspan="1">'.$totalOtherExpensePercent.'</td>
			<td colspan="1">'.$even_totalOtherExpense.'</td>
			<td colspan="1">'.$even_totalOtherExpensePercent.'</td>
			<td colspan="1">'.$over1_totalOtherExpense.'</td>
			<td colspan="1">'.$over1_totalOtherExpensePercent.'</td>
			<td colspan="1">'.$over2_totalOtherExpense.'</td>
			<td colspan="1">'.$over2_totalOtherExpensePercent.'</td>
			<td colspan="1">'.$over3_totalOtherExpense.'</td>
			<td colspan="1">'.$over3_totalOtherExpensePercent.'</td>
			<td colspan="1">'.$over4_totalOtherExpense.'</td>
			<td colspan="1">'.$over4_totalOtherExpensePercent.'</td>
			<td colspan="1">'.$over5_totalOtherExpense.'</td>
			<td colspan="1">'.$over5_totalOtherExpensePercent.'</td>
			
		</tr>

		<tr>
			<th colspan="1">'.$marketingTitle.'</th>
			<th colspan="14">'.$test.'</th>

		</tr>

		<tr>
			<td colspan="1">'.$newsInTitle.'</td>
			<td colspan="1">'.$newsIn.'</td>
			<td colspan="1">'.$newsInPercent.'</td>
			<td colspan="1">'.$even_newsIn.'</td>
			<td colspan="1">'.$even_newsInPercent.'</td>
			<td colspan="1">'.$over1_newsIn.'</td>
			<td colspan="1">'.$over1_newsInPercent.'</td>
			<td colspan="1">'.$over2_newsIn.'</td>
			<td colspan="1">'.$over2_newsInPercent.'</td>
			<td colspan="1">'.$over3_newsIn.'</td>
			<td colspan="1">'.$over3_newsInPercent.'</td>
			<td colspan="1">'.$over4_newsIn.'</td>
			<td colspan="1">'.$over4_newsInPercent.'</td>
			<td colspan="1">'.$over5_newsIn.'</td>
			<td colspan="1">'.$over5_newsInPercent.'</td>
			
		</tr>

		<tr>
			<td colspan="1">'.$directMailTitle.'</td>
			<td colspan="1">'.$directMail.'</td>
			<td colspan="1">'.$directMailPercent.'</td>
			<td colspan="1">'.$even_directMail.'</td>
			<td colspan="1">'.$even_directMailPercent.'</td>
			<td colspan="1">'.$over1_directMail.'</td>
			<td colspan="1">'.$over1_directMailPercent.'</td>
			<td colspan="1">'.$over2_directMail.'</td>
			<td colspan="1">'.$over2_directMailPercent.'</td>
			<td colspan="1">'.$over3_directMail.'</td>
			<td colspan="1">'.$over3_directMailPercent.'</td>
			<td colspan="1">'.$over4_directMail.'</td>
			<td colspan="1">'.$over4_directMailPercent.'</td>
			<td colspan="1">'.$over5_directMail.'</td>
			<td colspan="1">'.$over5_directMailPercent.'</td>
			
		</tr>

		<tr>
			<td colspan="1">'.$doorHangTitle.'</td>
			<td colspan="1">'.$doorHang.'</td>
			<td colspan="1">'.$doorHangPercent.'</td>
			<td colspan="1">'.$even_doorHang.'</td>
			<td colspan="1">'.$even_doorHangPercent.'</td>
			<td colspan="1">'.$over1_doorHang.'</td>
			<td colspan="1">'.$over1_doorHangPercent.'</td>
			<td colspan="1">'.$over2_doorHang.'</td>
			<td colspan="1">'.$over2_doorHangPercent.'</td>
			<td colspan="1">'.$over3_doorHang.'</td>
			<td colspan="1">'.$over3_doorHangPercent.'</td>
			<td colspan="1">'.$over4_doorHang.'</td>
			<td colspan="1">'.$over4_doorHangPercent.'</td>
			<td colspan="1">'.$over5_doorHang.'</td>
			<td colspan="1">'.$over5_doorHangPercent.'</td>
			
		</tr>

		<tr>
			<td colspan="1">'.$targetMarketTitle.'</td>
			<td colspan="1">'.$targetMarket.'</td>
			<td colspan="1">'.$targetMarketPercent.'</td>
			<td colspan="1">'.$even_targetMarket.'</td>
			<td colspan="1">'.$even_targetMarketPercent.'</td>
			<td colspan="1">'.$over1_targetMarket.'</td>
			<td colspan="1">'.$over1_targetMarketPercent.'</td>
			<td colspan="1">'.$over2_targetMarket.'</td>
			<td colspan="1">'.$over2_targetMarketPercent.'</td>
			<td colspan="1">'.$over3_targetMarket.'</td>
			<td colspan="1">'.$over3_targetMarketPercent.'</td>
			<td colspan="1">'.$over4_targetMarket.'</td>
			<td colspan="1">'.$over4_targetMarketPercent.'</td>
			<td colspan="1">'.$over5_targetMarket.'</td>
			<td colspan="1">'.$over5_targetMarketPercent.'</td>
			
		</tr>

		<tr>
			<td colspan="1">'.$printingTitle.'</td>
			<td colspan="1">'.$printing.'</td>
			<td colspan="1">'.$printingPercent.'</td>
			<td colspan="1">'.$even_printing.'</td>
			<td colspan="1">'.$even_printingPercent.'</td>
			<td colspan="1">'.$over1_printing.'</td>
			<td colspan="1">'.$over1_printingPercent.'</td>
			<td colspan="1">'.$over2_printing.'</td>
			<td colspan="1">'.$over2_printingPercent.'</td>
			<td colspan="1">'.$over3_printing.'</td>
			<td colspan="1">'.$over3_printingPercent.'</td>
			<td colspan="1">'.$over4_printing.'</td>
			<td colspan="1">'.$over4_printingPercent.'</td>
			<td colspan="1">'.$over5_printing.'</td>
			<td colspan="1">'.$over5_printingPercent.'</td>
			
		</tr>

		<tr>
			<td colspan="1">'.$vipTitle.'</td>
			<td colspan="1">'.$vip.'</td>
			<td colspan="1">'.$vipPercent.'</td>
			<td colspan="1">'.$even_vip.'</td>
			<td colspan="1">'.$even_vipPercent.'</td>
			<td colspan="1">'.$over1_vip.'</td>
			<td colspan="1">'.$over1_vipPercent.'</td>
			<td colspan="1">'.$over2_vip.'</td>
			<td colspan="1">'.$over2_vipPercent.'</td>
			<td colspan="1">'.$over3_vip.'</td>
			<td colspan="1">'.$over3_vipPercent.'</td>
			<td colspan="1">'.$over4_vip.'</td>
			<td colspan="1">'.$over4_vipPercent.'</td>
			<td colspan="1">'.$over5_vip.'</td>
			<td colspan="1">'.$over5_vipPercent.'</td>
			
		</tr>

		<tr>
			<td colspan="1">'.$guerSquadTitle.'</td>
			<td colspan="1">'.$guerSquad.'</td>
			<td colspan="1">'.$guerSquadPercent.'</td>
			<td colspan="1">'.$even_guerSquad.'</td>
			<td colspan="1">'.$even_guerSquadPercent.'</td>
			<td colspan="1">'.$over1_guerSquad.'</td>
			<td colspan="1">'.$over1_guerSquadPercent.'</td>
			<td colspan="1">'.$over2_guerSquad.'</td>
			<td colspan="1">'.$over2_guerSquadPercent.'</td>
			<td colspan="1">'.$over3_guerSquad.'</td>
			<td colspan="1">'.$over3_guerSquadPercent.'</td>
			<td colspan="1">'.$over4_guerSquad.'</td>
			<td colspan="1">'.$over4_guerSquadPercent.'</td>
			<td colspan="1">'.$over5_guerSquad.'</td>
			<td colspan="1">'.$over5_guerSquadPercent.'</td>
			
		</tr>

		<tr>
			<td colspan="1">'.$virtualWorldTitle.'</td>
			<td colspan="1">'.$virtualWorld.'</td>
			<td colspan="1">'.$virtualWorldPercent.'</td>
			<td colspan="1">'.$even_virtualWorld.'</td>
			<td colspan="1">'.$even_virtualWorldPercent.'</td>
			<td colspan="1">'.$over1_virtualWorld.'</td>
			<td colspan="1">'.$over1_virtualWorldPercent.'</td>
			<td colspan="1">'.$over2_virtualWorld.'</td>
			<td colspan="1">'.$over2_virtualWorldPercent.'</td>
			<td colspan="1">'.$over3_virtualWorld.'</td>
			<td colspan="1">'.$over3_virtualWorldPercent.'</td>
			<td colspan="1">'.$over4_virtualWorld.'</td>
			<td colspan="1">'.$over4_virtualWorldPercent.'</td>
			<td colspan="1">'.$over5_virtualWorld.'</td>
			<td colspan="1">'.$over5_virtualWorldPercent.'</td>
			
		</tr>

		<tr>
			<td colspan="1">'.$foodDiscountTitle.'</td>
			<td colspan="1">'.$foodDiscount.'</td>
			<td colspan="1">'.$foodDiscountPercent.'</td>
			<td colspan="1">'.$even_foodDiscount.'</td>
			<td colspan="1">'.$even_foodDiscountPercent.'</td>
			<td colspan="1">'.$over1_foodDiscount.'</td>
			<td colspan="1">'.$over1_foodDiscountPercent.'</td>
			<td colspan="1">'.$over2_foodDiscount.'</td>
			<td colspan="1">'.$over2_foodDiscountPercent.'</td>
			<td colspan="1">'.$over3_foodDiscount.'</td>
			<td colspan="1">'.$over3_foodDiscountPercent.'</td>
			<td colspan="1">'.$over4_foodDiscount.'</td>
			<td colspan="1">'.$over4_foodDiscountPercent.'</td>
			<td colspan="1">'.$over5_foodDiscount.'</td>
			<td colspan="1">'.$over5_foodDiscountPercent.'</td>
			
		</tr>

		<tr>
			<td colspan="1">'.$alcoholDiscountTitle.'</td>
			<td colspan="1">'.$alcoholDiscount.'</td>
			<td colspan="1">'.$alcoholDiscountPercent.'</td>
			<td colspan="1">'.$even_alcoholDiscount.'</td>
			<td colspan="1">'.$even_alcoholDiscountPercent.'</td>
			<td colspan="1">'.$over1_alcoholDiscount.'</td>
			<td colspan="1">'.$over1_alcoholDiscountPercent.'</td>
			<td colspan="1">'.$over2_alcoholDiscount.'</td>
			<td colspan="1">'.$over2_alcoholDiscountPercent.'</td>
			<td colspan="1">'.$over3_alcoholDiscount.'</td>
			<td colspan="1">'.$over3_alcoholDiscountPercent.'</td>
			<td colspan="1">'.$over4_alcoholDiscount.'</td>
			<td colspan="1">'.$over4_alcoholDiscountPercent.'</td>
			<td colspan="1">'.$over5_alcoholDiscount.'</td>
			<td colspan="1">'.$over5_alcoholDiscountPercent.'</td>
			
		</tr>

		<tr>
			<td colspan="1">'.$totalDirectMarketingTitle.'</td>
			<td colspan="1">'.$totalDirectMarketing.'</td>
			<td colspan="1">'.$totalDirectMarketingPercent.'</td>
			<td colspan="1">'.$even_totalDirectMarketing.'</td>
			<td colspan="1">'.$even_totalDirectMarketingPercent.'</td>
			<td colspan="1">'.$over1_totalDirectMarketing.'</td>
			<td colspan="1">'.$over1_totalDirectMarketingPercent.'</td>
			<td colspan="1">'.$over2_totalDirectMarketing.'</td>
			<td colspan="1">'.$over2_totalDirectMarketingPercent.'</td>
			<td colspan="1">'.$over3_totalDirectMarketing.'</td>
			<td colspan="1">'.$over3_totalDirectMarketingPercent.'</td>
			<td colspan="1">'.$over4_totalDirectMarketing.'</td>
			<td colspan="1">'.$over4_totalDirectMarketingPercent.'</td>
			<td colspan="1">'.$over5_totalDirectMarketing.'</td>
			<td colspan="1">'.$over5_totalDirectMarketingPercent.'</td>
			
		</tr>

		<tr>
			<td colspan="1">'.$nationalAdvertisingTitle.'</td>
			<td colspan="1">'.$nationalAdvertising.'</td>
			<td colspan="1">'.$nationalAdvertisingPercent.'</td>
			<td colspan="1">'.$even_nationalAdvertising.'</td>
			<td colspan="1">'.$even_nationalAdvertisingPercent.'</td>
			<td colspan="1">'.$over1_nationalAdvertising.'</td>
			<td colspan="1">'.$over1_nationalAdvertisingPercent.'</td>
			<td colspan="1">'.$over2_nationalAdvertising.'</td>
			<td colspan="1">'.$over2_nationalAdvertisingPercent.'</td>
			<td colspan="1">'.$over3_nationalAdvertising.'</td>
			<td colspan="1">'.$over3_nationalAdvertisingPercent.'</td>
			<td colspan="1">'.$over4_nationalAdvertising.'</td>
			<td colspan="1">'.$over4_nationalAdvertisingPercent.'</td>
			<td colspan="1">'.$over5_nationalAdvertising.'</td>
			<td colspan="1">'.$over5_nationalAdvertisingPercent.'</td>
			
		</tr>

		<tr>
			<td colspan="1">'.$regionalCoopAdTitle.'</td>
			<td colspan="1">'.$regionalCoopAd.'</td>
			<td colspan="1">'.$regionalCoopAdPercent.'</td>
			<td colspan="1">'.$even_regionalCoopAd.'</td>
			<td colspan="1">'.$even_regionalCoopAdPercent.'</td>
			<td colspan="1">'.$over1_regionalCoopAd.'</td>
			<td colspan="1">'.$over1_regionalCoopAdPercent.'</td>
			<td colspan="1">'.$over2_regionalCoopAd.'</td>
			<td colspan="1">'.$over2_regionalCoopAdPercent.'</td>
			<td colspan="1">'.$over3_regionalCoopAd.'</td>
			<td colspan="1">'.$over3_regionalCoopAdPercent.'</td>
			<td colspan="1">'.$over4_regionalCoopAd.'</td>
			<td colspan="1">'.$over4_regionalCoopAdPercent.'</td>
			<td colspan="1">'.$over5_regionalCoopAd.'</td>
			<td colspan="1">'.$over5_regionalCoopAdPercent.'</td>
			
		</tr>

		<tr>
			<td colspan="1">'.$totalMarketingTitle.'</td>
			<td colspan="1">'.$totalMarketing.'</td>
			<td colspan="1">'.$totalMarketingPercent.'</td>
			<td colspan="1">'.$even_totalMarketing.'</td>
			<td colspan="1">'.$even_totalMarketingPercent.'</td>
			<td colspan="1">'.$over1_totalMarketing.'</td>
			<td colspan="1">'.$over1_totalMarketingPercent.'</td>
			<td colspan="1">'.$over2_totalMarketing.'</td>
			<td colspan="1">'.$over2_totalMarketingPercent.'</td>
			<td colspan="1">'.$over3_totalMarketing.'</td>
			<td colspan="1">'.$over3_totalMarketingPercent.'</td>
			<td colspan="1">'.$over4_totalMarketing.'</td>
			<td colspan="1">'.$over4_totalMarketingPercent.'</td>
			<td colspan="1">'.$over5_totalMarketing.'</td>
			<td colspan="1">'.$over5_totalMarketingPercent.'</td>
			
		</tr>

		<tr>
			<td colspan="1">'.$totalExpenseTitle.'</td>
			<td colspan="1">'.$totalExpense.'</td>
			<td colspan="1">'.$totalExpensePercent.'</td>
			<td colspan="1">'.$even_totalExpense.'</td>
			<td colspan="1">'.$even_totalExpensePercent.'</td>
			<td colspan="1">'.$over1_totalExpense.'</td>
			<td colspan="1">'.$over1_totalExpensePercent.'</td>
			<td colspan="1">'.$over2_totalExpense.'</td>
			<td colspan="1">'.$over2_totalExpensePercent.'</td>
			<td colspan="1">'.$over3_totalExpense.'</td>
			<td colspan="1">'.$over3_totalExpensePercent.'</td>
			<td colspan="1">'.$over4_totalExpense.'</td>
			<td colspan="1">'.$over4_totalExpensePercent.'</td>
			<td colspan="1">'.$over5_totalExpense.'</td>
			<td colspan="1">'.$over5_totalExpensePercent.'</td>
			
		</tr>

		<tr>
			<td colspan="1">'.$netProfitTitle.'</td>
			<td colspan="1">'.$netProfit.'</td>
			<td colspan="1">'.$netProfitPercent.'</td>
			<td colspan="1">'.$even_netProfit.'</td>
			<td colspan="1">'.$even_netProfitPercent.'</td>
			<td colspan="1">'.$over1_netProfit.'</td>
			<td colspan="1">'.$over1_netProfitPercent.'</td>
			<td colspan="1">'.$over2_netProfit.'</td>
			<td colspan="1">'.$over2_netProfitPercent.'</td>
			<td colspan="1">'.$over3_netProfit.'</td>
			<td colspan="1">'.$over3_netProfitPercent.'</td>
			<td colspan="1">'.$over4_netProfit.'</td>
			<td colspan="1">'.$over4_netProfitPercent.'</td>
			<td colspan="1">'.$over5_netProfit.'</td>
			<td colspan="1">'.$over5_netProfitPercent.'</td>
			
		</tr>





	</table>

	';


}// End display_breakeven

add_shortcode( 'restaurateur_breakeven', 'display_breakeven' );

?>
