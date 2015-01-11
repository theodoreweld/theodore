Changelog
==========
### 3.0.0
> Support A0-1.0, B0-1.0, B0-2.0, B0-2.1, B0-2.2, B0-2.3, B0-3.0.
  
  1. Add new characteristics: prevent squatters.
  2. Add ENUM `Beacon.MovingState` for `Beacon.getMovingState`.
  3. Deprecated API `SensoroBeaconManager.setOutOfRangeDelay(long delayMills)`
  4. Deprecated class `BatterySaveInBackground`
  5. Change some methods renturn type: `Beacon.getMajor()`,`Beacon.getMinor()`,`Beacon.getLight()`,`Beacon.getTemperature()`. If they return null, it means their function are disabled. For more details to see [Javadoc](http://sensoro.github.io/download/sdk/android/doc/index.html).
  
  Important upgrade as below:
  1. Change `com.sensoro.beacon.kit.SensoroBeaconManager.BeaconManagerListener` to `com.sensoro.beacon.kit.BeaconManagerListener` 
  2. Use `com.sensoro.cloud.SensoroManager` instead of `com.sensoro.beacon.kit.SensoroBeaconManager`.
  3. Change SDK scan mode.(You need to add ```<service android:name="com.sensoro.beacon.kit.IntentProcessorService"></service>``` in your *AndroidManifest.xml*)
  4. Add API `SensoroManager.addBroadcastKey(String broadcastKey)` 
  5. Add API `SensoroManager.isBluetoothEnabled()`.
  6. Add API `SensoroManager.setCloudServiceEnable(bool)`.
 
### 2.1.4
> Support A0-1.0, B0-1.0, B0-2.0, B0-2.1, B0-2.2, B0-2.3.

1. Deprecated `TransmitPower.MIN`, `TransmitPower.LOW`, `TransmitPower.MEDIUM`, `TransmitPower.HIGH` and `TransmitPower.MAX`.
    - Add `TransmitPower.LEVEL0`, `TransmitPower.LEVEL1`, `TransmitPower.LEVEL2`, `TransmitPower.LEVEL3` , `TransmitPower.LEVEL4`, `TransmitPower.LEVEL5`, `TransmitPower.LEVEL6`and `TransmitPower.LEVEL7`.
2. **Important upgrade**. For more details to see [Javadoc](http://sensoro.github.io/download/sdk/android/doc/index.html).

### 2.1.3
> Support A0-1.0, B0-1.0, B0-2.0, B0-2.1, B0-2.2, B0-2.3.
    
1. Add ENUM `SecureBroadcastInterval`.
2. Change API `writeSecureBroadcastRotationInterval(int)` to `writeSecureBroadcastInterval(SecureBroadcastInterval)`.

### 2.1.2
> Support A0-1.0, B0-1.0, B0-2.0, B0-2.1, B0-2.2, B0-2.3.

1. Add API secure broadcast - `writeSecureBroadcastRotationInterval`.
2. Fix calculate accelerometer count bug.

### 2.1.1
> Support A0-1.0, B0-1.0, B0-2.0, B0-2.1, B0-2.2.

1. **Important upgrade**: Upgrade APIs. For more [click](https://github.com/sensoro/SBK-Android/releases/tag/v2.1.1) here.
2. Fix *ConcurrentModificationException* bug.

### 2.1
> Support A0-1.0, B0-1.0, B0-2.0, B0-2.1, B0-2.2.

1. Improve the JavaDoc of SDK.
2. Add the version of SDK.

### 2.0
> Support A0-1.0, B0-1.0, B0-2.0, B0-2.1, B0-2.2.

1. Change Java annotation of SDK from Chinese to English.
2. Support that the hardware of Yunzi is above 2.0.
3. Throw exception when calls `startService`.

### 1.1
> Support A0-1.0, B0-1.0, B0-2.0.

1. Support that the hardware of Yunzi is 2.0.
2. Add a value ` ADVERTISING_INTERVAL_1285` of *AdvertisingInterval*.
3. Fix some bugs.

### 1.0
> Support A0-1.0, B0-1.0.

1. Initial version.
