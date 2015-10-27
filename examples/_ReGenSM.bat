set CURDIR=%CD%
\workspace\apps\plink.exe -ssh vagrant@vagrant -pw vagrant /vagrant/_helpers/cdRun.sh '%CURDIR%' _ReGenSM.sh
\workspace\apps\plink.exe -ssh vagrant@vagrant -pw vagrant /vagrant/_helpers/cdRun.sh '%CURDIR%' _ReGenSMViz.sh
pause